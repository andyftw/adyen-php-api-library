<?php

namespace Adyen;

/**
 * Created by PhpStorm.
 * User: SwiTool
 * Date: 11/15/16
 * Time: 2:05 PM
 */
class MarketPayTest extends TestCase
{
    public function testCreateAccountHolder()
    {
        // initialize client
        $client = $this->createMarketPayClient();

        // initialize service
        $service = new Service\MarketPay($client);

        $accountHolderCode = 'test' . time();

        $json = '{
            "accountHolderCode": "' . $accountHolderCode .'",
            "accountHolderDetails":{
               "address":{
                  "city":"Amsterdam",
                  "country":"NL",
                  "houseNumberOrName":"10",
                  "postalCode":"12345",
                  "stateOrProvince":"NH",
                  "street":"Teststreet 1"
               },
               "bankAccountDetails":[
                  {
                     "BankAccountDetail":{
                        "countryCode":"NL",
                        "currencyCode":"EUR",
                        "iban":"NL13TEST0123456789",
                        "ownerCity":"ownerCity",
                        "ownerCountryCode":"NL",
                        "ownerDateOfBirth":"1980-01-01",
                        "ownerHouseNumberOrName":"houseNumberOrName",
                        "ownerName":"ownerName",
                        "ownerNationality":"NL",
                        "ownerPostalCode":"ownerPostalCode",
                        "ownerState":"ownerState",
                        "ownerStreet":"ownerStreet",
                        "primaryAccount":"true",
                        "taxId":"bankTaxId"
                     }
                  }
               ],
               "email":"test@adyen.com",
               "individualDetails":{
                  "name":{
                     "firstName":"First name",
                     "gender":"MALE",
                     "lastName":"Last Name"
                  },
                  "personalData":{
                     "dateOfBirth":"1970-01-01",
                     "idNumber":"1234567890",
                     "nationality":"NL"
                  }
               },
               "merchantCategoryCode":"7999",
               "phoneNumber":{
                  "phoneCountryCode":"NL",
                  "phoneNumber":"0612345678",
                  "phoneType":"Mobile"
               },
               "webAddress":"http://www.adyen.com"
            },
            "createDefaultAccount":"true",
            "legalEntity":"Individual"
        }';

        $params = json_decode($json, true);

        try {
            $result = $service->createAccountHolder($params);
        } catch (\Exception $e) {
            $this->validateApiPermission($e);
        }

        // must exists
        $this->assertTrue(isset($result['pspReference']));

        // must exists
        $this->assertTrue(isset($result['submittedAsync']));

        // return the result so this can be used in other test cases
        return $result;
    }
}
