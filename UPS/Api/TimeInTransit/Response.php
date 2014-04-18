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

    /**
     * @return \Traversable
     */
    public function getServiceSummary()
    {
        return $this->TransitResponse->ServiceSummary;
    }

    /**
     * @return int
     */
    public function getServiceSummaryCount()
    {
        return count($this->TransitResponse->ServiceSummary);
    }
}