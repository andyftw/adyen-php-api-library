<?php

namespace Adyen\Service;

class MarketPay extends \Adyen\Service
{
    protected $_createAccountHolder;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_createAccountHolder = new \Adyen\Service\ResourceModel\MarketPay\CreateAccountHolder($this);
    }

    public function createAccountHolder($params)
    {
        $result = $this->_createAccountHolder->request($params);
        return $result;
    }
}
