<?php

namespace UPS;

abstract class Response extends \SimpleXMLElement
{

    public function getResponseData()
    {
        return $this->Response;
    }

    public function getResponseStatusCode()
    {
        return $this->Response->ResponseStatusCode;
    }

    public function getResponseStatusDescription()
    {
        return $this->Response->ResponseStatusDescription;
    }

    public function getResponseError()
    {
        if ($this->Response->Error){
            return $this->Response->Error;
        }

        return false;
    }
}