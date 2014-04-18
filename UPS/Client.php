<?php
/**
 * Created by ashwin@redinkdesign.net
 */
namespace UPS;

class Client
{
    protected $_api_key;
    protected $_user_id;
    protected $_password;
    protected $_debug;
    protected $_curl_handle;

    public function __construct($api_key, $user_id, $password, $debug = false)
    {
        if (empty($api_key)){
            throw new \InvalidArgumentException('Invalid API key');
        }

        if (empty($user_id)){
            throw new \InvalidArgumentException('Invalid user id');
        }

        if (empty($password)){
            throw new \InvalidArgumentException('Invalid password');
        }

        $this->_api_key = $api_key;
        $this->_user_id = $user_id;
        $this->_password = $password;
        $this->_debug = $debug;

    }

    public function setDebug($is_debug)
    {
        $this->_debug = $is_debug;

        return $this;
    }

    public function isDebug()
    {
        return $this->_debug;
    }

    /*
     * <?xml version="1.0" ?>
            <AccessRequest xml:lang='en-US'>
                <AccessLicenseNumber>YOURACCESSLICENSENUMBER</AccessLicenseNumber>
                <UserId>YOURUSERID</UserId>
                <Password>YOURPASSWORD</Password>
        </AccessRequest>
     */
    public function assembleAccessRequest()
    {
        $xml = new \DOMDocument();
        $ar = $xml->appendChild($xml->createElement('AccessRequest'));
        $ar->setAttribute('xml:lang', 'en-US');

        $ar->appendChild($xml->createElement("AccessLicenseNumber", $this->_api_key));
        $ar->appendChild($xml->createElement("UserId", $this->_user_id));
        $ar->appendChild($xml->createElement("Password", $this->_password));

        return $xml->saveXML();
    }

    protected function formatTimestamp($timestamp)
    {
        if (!is_numeric($timestamp)){
            $timestamp = strtotime($timestamp);
        }

        return date('YmdHis', $timestamp);
    }

    public function makeRequest($url, $payload, $method = 'POST', array $headers = array(), array $curl_options = array())
    {
        $ch = $this->_getCurlHandle();
        $method = strtoupper($method);

        $payload = $this->assembleAccessRequest() . $payload;

        $options = array(
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
        );

        $headers[] = 'Content-Length: ' . strlen($options[CURLOPT_POSTFIELDS]);
        $options[CURLOPT_HTTPHEADER] = $headers;

        if (!empty($curl_options)){
            $options = array_merge($options, $curl_options);
        }

        curl_setopt_array($ch, $options);
        $this->_raw_response = curl_exec($ch);
        $this->_debug_info = curl_getinfo($ch);

        if ($this->_raw_response === false){
            throw new \RuntimeException('Request Error: ' . curl_error($ch));
        }

        if ($this->_debug_info['http_code'] < 200 || $this->_debug_info['http_code'] >= 400){
            throw new \RuntimeException('API Request failed - Response: ' . $this->_raw_response, $this->_debug_info['http_code']);
        }

        return $this->_raw_response;
    }

    /**
     * Singleton to get a CURL handle
     *
     * @return resource
     */
    protected function _getCurlHandle(){

        if (!$this->_curl_handle){
            $this->_curl_handle = curl_init();
        }

        return $this->_curl_handle;

    }

    /**
     * Closes the currently open CURL handle
     */
    public function __destruct(){

        if ($this->_curl_handle){
            curl_close($this->_curl_handle);
        }

    }
}
