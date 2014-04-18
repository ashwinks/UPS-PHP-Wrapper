<?php

namespace UPS;

abstract class Response
{
    protected $_data;

    public function __construct(\SimpleXMLElement &$response)
    {
        $this->_data = $response;
    }

    public function getData()
    {
        return $this->_data;
    }

    public function getResponseData()
    {
        return $this->getData();
    }

    public function getResponseStatusCode()
    {
        return $this->_data->Response->ResponseStatusCode;
    }

    public function getResponseStatusDescription()
    {
        return $this->_data->Response->ResponseStatusDescription;
    }

    public function getResponseError()
    {
        if ($this->_data->Response->Error){
            return $this->_data->Response->Error;
        }

        return false;
    }
}