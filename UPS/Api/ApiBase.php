<?php

namespace UPS\Api;

abstract class ApiBase
{
    protected $_client;
    protected $_development_url;
    protected $_production_url;

    abstract protected function buildRequestPayload();

    public function getDevelopmentUrl()
    {
        if (!$this->_development_url){
            throw new \InvalidArgumentException('Invalid development url');
        }

        return $this->_development_url;
    }

    public function getProductionUrl()
    {
        if (!$this->_production_url){
            throw new \InvalidArgumentException('Invalid production url');
        }

        return $this->_production_url;
    }

    /**
     * @param \UPS\Client $client
     */
    public function __construct(\UPS\Client $client)
    {
        $this->_client = $client;
    }

    /**
     * @return \UPS\Client
     */
    public function getClient()
    {
        return $this->_client;
    }

    public function makeRequest()
    {
        if ($this->getClient()->isDebug()){
            $url = $this->getDevelopmentUrl();
        }else{
            $url = $this->getProductionUrl();
        }

        return $this->getClient()->makeRequest($url, $this->buildRequestPayload());
    }

}