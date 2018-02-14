<?php

namespace Adyen\Service;

class MarketPay extends \Adyen\Service
{
    protected $_createAccountHolder;
    protected $_getAccountHolder;
    protected $_closeAccountHolder;
    protected $_closeAccount;

    public function __construct(\Adyen\Client $client)
    {
        parent::__construct($client);

        $this->_createAccountHolder = new \Adyen\Service\ResourceModel\MarketPay\CreateAccountHolder($this);
        $this->_getAccountHolder = new \Adyen\Service\ResourceModel\MarketPay\GetAccountHolder($this);
        $this->_closeAccountHolder = new \Adyen\Service\ResourceModel\MarketPay\CloseAccountHolder($this);
        $this->_closeAccount = new \Adyen\Service\ResourceModel\MarketPay\CloseAccount($this);
    }

    public function createAccountHolder($params)
    {
        $result = $this->_createAccountHolder->request($params);
        return $result;
    }
    
    public function getAccountHolder($params)
    {
        $result = $this->_getAccountHolder->request($params);
        return $result;
    }
    
    public function closeAccountHolder($params)
    {
        $result = $this->_closeAccountHolder->request($params);
        return $result;
    }
    
    public function closeAccount($params)
    {
        $result = $this->_closeAccount->request($params);
        return $result;
    }
}
