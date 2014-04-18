<?php

namespace UPS\Api\TimeInTransit;

class Response extends \UPS\Response
{
    public function getTransitFrom()
    {
        return $this->TransitResponse->TransitFrom->AddressArtifactFormat;
    }

    public function getPickupDate()
    {
        return $this->TransitResponse->PickupDate;
    }

    public function getTransitTo()
    {
        return $this->TransitResponse->TransitTo->AddressArtifactFormat;
    }

    public function getShipmentWeight()
    {
        return $this->TransitResponse->ShipmentWeight;
    }

    public function getInvoiceLineTotal()
    {
        return $this->TransitResponse->InvoiceLineTotal;
    }

    public function getDisclaimer()
    {
        return $this->TransitResponse->Disclaimer;
    }

    public function getServiceSummary()
    {
        echo '<pre>';
        print_r($this->TransitResponse->ServiceSummary);
        return $this->TransitResponse->ServiceSummary;
    }

    public function getServiceSummaryCount()
    {
        return count($this->TransitResponse->ServiceSummary);
    }
}