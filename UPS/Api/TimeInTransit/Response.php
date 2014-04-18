<?php

namespace UPS\Api\TimeInTransit;

class Response extends \UPS\Response
{
    public function getTransitFrom()
    {
        return $this->getData()->TransitResponse->TransitFrom->AddressArtifactFormat;
    }

    public function getPickupDate()
    {
        return $this->getData()->TransitResponse->PickupDate;
    }

    public function getTransitTo()
    {
        return $this->getData()->TransitResponse->TransitTo->AddressArtifactFormat;
    }

    public function getShipmentWeight()
    {
        return $this->getData()->TransitResponse->ShipmentWeight;
    }

    public function getInvoiceLineTotal()
    {
        return $this->getData()->TransitResponse->InvoiceLineTotal;
    }

    public function getDisclaimer()
    {
        return $this->getData()->TransitResponse->Disclaimer;
    }

    public function getServiceSummary()
    {
        return $this->getData()->TransitResponse->ServiceSummary;
    }

    public function getServiceSummaryCount()
    {
        return count($this->getData()->TransitResponse->ServiceSummary);
    }
}