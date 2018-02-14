<?php

namespace Adyen\Service\ResourceModel\MarketPay;

class CloseAccountHolder extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'accountHolderCode'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointMarketPay') . '/cal/services/Account/' . $service->getClient()->getApiMarketPayVersion() . '/closeAccountHolder';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }
}
