<?php

namespace Adyen\Service\ResourceModel\MarketPay;

class GetAccountHolder extends \Adyen\Service\AbstractResource
{
    /**
     * Either an accountHolderCode or accountCode must be specified in this call.
     * Otherwise, the error code 10_080 is returned ("No account holder or account specified").
     */
    protected $_requiredFields = array(
        // 'accountHolderCode',
        // 'accountCode'
    );

    protected $_endpoint;

    public function __construct($service)
    {
        $this->_endpoint = $service->getClient()->getConfig()->get('endpointMarketPay') . '/cal/services/Account/' . $service->getClient()->getApiMarketPayVersion() . '/getAccountHolder';
        parent::__construct($service, $this->_endpoint, $this->_requiredFields);
    }
}
