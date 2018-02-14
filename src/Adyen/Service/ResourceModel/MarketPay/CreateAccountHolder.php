<?php

namespace Adyen\Service\ResourceModel\MarketPay;

class CreateAccountHolder extends \Adyen\Service\AbstractResource
{
    protected $_requiredFields = array(
        'accountHolderCode',
        'accountHolderDetails.email',
        'legalEntity'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointMarketPay') . '/cal/services/Account/' . $service->getClient()->getApiMarketPayVersion() . '/createAccountHolder';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }
}
