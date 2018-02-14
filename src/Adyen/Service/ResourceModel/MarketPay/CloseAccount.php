<?php

namespace Adyen\Service\ResourceModel\MarketPay;

class CloseAccount extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'accountCode'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointMarketPay') . '/cal/services/Account/' . $service->getClient()->getApiMarketPayVersion() . '/closeAccount';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }
}
