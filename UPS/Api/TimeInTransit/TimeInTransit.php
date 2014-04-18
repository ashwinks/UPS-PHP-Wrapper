<?php

namespace UPS\Api\TimeInTransit;

use UPS\Api;

class TimeInTransit extends Api\ApiBase
{
    public $to_city;
    public $to_state;
    public $to_postal_code;
    public $to_postal_code_extended;
    public $to_country;
    public $to_town;

    public $from_city;
    public $from_state;
    public $from_postal_code;
    public $from_postal_code_extended;
    public $from_country;
    public $from_town;

    public $pickup_date;
    public $maximum_list_size = 35;

    public $currency_code;
    public $monetary_value;

    public $unit_of_measurement_code;
    public $unit_of_measurement_desc;
    public $weight;

    protected $_development_url = 'https://wwwcie.ups.com/ups.app/xml/TimeInTransit';
    protected $_production_url = 'https://onlinetools.ups.com/ups.app/xml/TimeInTransit';

    public function setFromCity($city)
    {
        $this->from_city = trim($city);

        return $this;
    }

    public function setFromState($state)
    {
        $this->from_state = trim($state);

        return $this;
    }

    public function setFromPostalCode($postal_code, $extended_code = null)
    {
        $this->from_postal_code = trim($postal_code);

        if ($extended_code){
            $this->from_postal_code_extended = trim($extended_code);
        }

        return $this;
    }

    public function setFromTown($town)
    {
        $this->from_town = trim($town);

        return $this;
    }

    public function setFromCountryCode($country_code)
    {
        $this->from_country = trim($country_code);

        return $this;
    }

    public function setToCity($city)
    {
        $this->to_city = trim($city);

        return $this;
    }

    public function setToState($state)
    {
        $this->to_state = trim($state);

        return $this;
    }

    public function setToPostalCode($postal_code, $extended_code = null)
    {
        $this->to_postal_code = trim($postal_code);

        if ($extended_code){
            $this->to_postal_code_extended = trim($extended_code);
        }

        return $this;
    }

    public function setToTown($town)
    {
        $this->to_town = trim($town);

        return $this;
    }

    public function setToCountryCode($country_code)
    {
        $this->to_country = trim($country_code);

        return $this;
    }

    /**
     * @param $pickup_date (YYYYMMDD)
     * @return $this
     */
    public function setPickupDate($pickup_date)
    {
        $this->pickup_date = trim($pickup_date);

        return $this;
    }

    public function setMaximumListSize($maximum_list_size)
    {
        $this->maximum_list_size = trim($maximum_list_size);

        return $this;
    }

    public function setCurrencyCode($currency_code)
    {
        $this->currency_code = trim($currency_code);

        return $this;
    }

    public function setMonetaryValue($monetary_value)
    {
        $this->monetary_value = trim($monetary_value);

        return $this;
    }

    public function setUnitOfMeasurementCode($unit_of_measurement_code)
    {
        $unit_of_measurement_code = strtoupper($unit_of_measurement_code);
        if ($unit_of_measurement_code !== 'LBS' && $unit_of_measurement_code !== 'KGS'){
            throw new \InvalidArgumentException('Invalid unit of measurement - valid values are LBS for pounds and KGS for kilograms');
        }

        $this->unit_of_measurement_code = trim($unit_of_measurement_code);

        return $this;
    }

    public function setUnitOfMeasurementDescription($unit_of_measurement_desc)
    {
        $this->unit_of_measurement_desc = trim($unit_of_measurement_desc);

        return $this;
    }

    public function setWeight($weight)
    {
        $this->weight = trim($weight);

        return $this;
    }

    public function getFromCity()
    {
        if (empty($this->from_city)){
            throw new \RuntimeException('Invalid from city');
        }

        return strtoupper($this->from_city);
    }

    public function getFromState()
    {
        if (empty($this->from_state)){
            throw new \RuntimeException('Invalid from state');
        }

        return strtoupper($this->from_state);
    }

    public function getFromTown()
    {
        return strtoupper($this->from_town);
    }

    public function getToTown()
    {
        return strtoupper($this->to_town);
    }

    public function getFromPostalCode()
    {
        if (empty($this->from_postal_code)){
            throw new \RuntimeException('Invalid from postal code');
        }

        return strtoupper($this->from_postal_code);
    }

    public function getFromPostalCodeExtended()
    {
        return $this->from_postal_code_extended;
    }

    public function getFromCountryCode()
    {
        if (empty($this->from_country)){
            throw new \RuntimeException('Invalid from country');
        }

        return strtoupper($this->from_country);
    }

    public function getToCity()
    {
        if (empty($this->to_city)){
            throw new \RuntimeException('Invalid to city');
        }

        return strtoupper($this->to_city);
    }

    public function getToState()
    {
        if (empty($this->to_state)){
            throw new \RuntimeException('Invalid to state');
        }

        return strtoupper($this->to_state);
    }

    public function getToPostalCode()
    {
        if (empty($this->to_postal_code)){
            throw new \RuntimeException('Invalid to postal code');
        }

        return $this->to_postal_code;
    }

    public function getToPostalCodeExtended()
    {
        return $this->to_postal_code_extended;
    }

    public function getToCountryCode()
    {
        if (empty($this->to_country)){
            throw new \RuntimeException('Invalid to country code');
        }

        return strtoupper($this->to_country);
    }

    public function getPickupDate()
    {
        if (empty($this->pickup_date)){
            throw new \RuntimeException('Invalid pickup date');
        }

        return $this->pickup_date;
    }

    public function getMaximumListSize()
    {
        return $this->maximum_list_size;
    }

    public function getCurrencyCode()
    {
        return strtoupper($this->currency_code);
    }

    public function getMonetaryValue()
    {
        if (!empty($this->monetary_value)){
            return $this->monetary_value;
        }

        return '';
    }

    public function getUnitOfMeasurementCode()
    {
        if (empty($this->unit_of_measurement_code)){
            throw new \RuntimeException('Invalid unit of measurement code');
        }

        return strtoupper($this->unit_of_measurement_code);
    }

    public function getUnitOfMeasurementDescription()
    {
        if (!empty($this->unit_of_measurement_desc)){
            return $this->unit_of_measurement_desc;
        }

        return '';
    }

    public function getWeight()
    {
        if (empty($this->weight)){
            throw new \RuntimeException('Invalid weight');
        }

        return $this->weight;
    }

    protected function buildRequestPayload()
    {
        $xml = new \DOMDocument();
        $root = $xml->appendChild($xml->createElement('TimeInTransitRequest'));
        $root->setAttribute('xml:lang', 'en-US');

        $request = $xml->createElement('Request');

        $transaction_reference = $xml->createElement('TransactionReference');
        $transaction_reference->appendChild($xml->createElement('CusomterContext', 'Your Test Case Summary Description'));
        $transaction_reference->appendChild($xml->createElement('XpciVersion', 1.001));
        $request->appendChild($transaction_reference);

        $request->appendChild($xml->createElement('RequestAction', 'TimeInTransit'));
        $root->appendChild($request);

        $transit_from = $xml->createElement('TransitFrom');
        $address_artifact_format = $xml->createElement('AddressArtifactFormat');
        $address_artifact_format->appendChild($xml->createElement('PoliticalDivision2', $this->getFromCity()));
        $address_artifact_format->appendChild($xml->createElement('PoliticalDivision1', $this->getFromState()));
        $address_artifact_format->appendChild($xml->createElement('PostcodePrimaryLow', $this->getFromPostalCode()));
        $address_artifact_format->appendChild($xml->createElement('PostcodeExtendedLow', $this->getFromPostalCodeExtended()));
        $address_artifact_format->appendChild($xml->createElement('CountryCode', $this->getFromCountryCode()));
        $transit_from->appendChild($address_artifact_format);
        $root->appendChild($transit_from);

        $transit_to = $xml->createElement('TransitTo');
        $address_artifact_format = $xml->createElement('AddressArtifactFormat');
        $address_artifact_format->appendChild($xml->createElement('PoliticalDivision2', $this->getToCity()));
        $address_artifact_format->appendChild($xml->createElement('PoliticalDivision1', $this->getToState()));
        $address_artifact_format->appendChild($xml->createElement('PostcodePrimaryLow', $this->getToPostalCode()));
        $address_artifact_format->appendChild($xml->createElement('PostcodePrimaryHigh', $this->getToPostalCode()));
        $address_artifact_format->appendChild($xml->createElement('PostcodeExtendedLow', $this->getToPostalCodeExtended()));
        $address_artifact_format->appendChild($xml->createElement('CountryCode', $this->getToCountryCode()));
        $transit_to->appendChild($address_artifact_format);
        $root->appendChild($transit_to);

        $root->appendChild($xml->createElement('PickupDate', $this->getPickupDate()));
        $root->appendChild($xml->createElement('MaximumListSize', $this->getMaximumListSize()));

        $invoice_line_total = $xml->createElement('InvoiceLineTotal');
        $invoice_line_total->appendChild($xml->createElement('CurrencyCode', $this->getCurrencyCode()));
        $invoice_line_total->appendChild($xml->createElement('MonetaryValue', $this->getMonetaryValue()));
        $root->appendChild($invoice_line_total);

        $shipment_weight = $xml->createElement('ShipmentWeight');
        $unit_of_measurement = $xml->createElement('UnitOfMeasurement');
        $unit_of_measurement->appendChild($xml->createElement('Code', $this->getUnitOfMeasurementCode()));
        $unit_of_measurement->appendChild($xml->createElement('Description', $this->getUnitOfMeasurementDescription()));
        $shipment_weight->appendChild($unit_of_measurement);
        $shipment_weight->appendChild($xml->createElement('Weight', $this->getWeight()));
        $root->appendChild($shipment_weight);

        return $xml->saveXML();
    }
}