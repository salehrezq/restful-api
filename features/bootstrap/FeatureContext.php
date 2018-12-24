<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->bearerToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjllNGMxNGFmNWY5OTQ5ODdjNTZmYzU5Yzk1MjQ4Y2Q5ZGMwZGY4NWZlZDY5ZTY2ZWRhY2RmNTExNjFiZjAyMzQzZWMwOWFmNDcwOGM0OWY3In0.eyJhdWQiOiI1IiwianRpIjoiOWU0YzE0YWY1Zjk5NDk4N2M1NmZjNTljOTUyNDhjZDlkYzBkZjg1ZmVkNjllNjZlZGFjZGY1MTE2MWJmMDIzNDNlYzA5YWY0NzA4YzQ5ZjciLCJpYXQiOjE1NDU1ODg5NzQsIm5iZiI6MTU0NTU4ODk3NCwiZXhwIjoxNTc3MTI0OTczLCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.bizPms_vPLLUKtoKALOCeIjVHS6rKqpBu05tdGo_ua6UAEg3yD6VdZpO6MX1xqUj2U2T_s64Oec820iVGvOiS0t0rIoxghPC-ZOaRSRrA1YwZjqU2sLQvE5c6skVGDK836U-UYcJDbMqr2TtaT_mhb3xqXWS1c3W4j6zZdrHYfozk5Nod8GPgpVc7RmYBBQ1Tu3gcSf0N3lK1rIJHxfvGPFHLzI-XVM3WxbUok3eLNVl2oeys6cDmQzFB_yE9BFrNvHWXDsuSkO2TtJtz8QC8Yo4-Wq600oY6BMdZJgq9nrRnWe1qSHCdPVAvc0TdIHUgWBVxIgObqnpJX0iBU10y0A6J3usgwiM5bdywQ3HNPSuqghIto94FXuABxazHtWl7fkQ9Qvw8p8gFfUZKvovn-vafy8b6M9NbhYqz12QDF4SQnoyX3rvmSDLaNtl3bDW7rUSVuktDIrkyz3wdz_w1hULt2aTEXPDyO4LNcXnAAK8zPOZ8WMZsxXG9JMg84q-wDr_ttA-hEMbPObHXRw2-uQhuCa-X1QP7kG6i5RMNp2PWT4U3_7hH1NZC1FqoKGohOOpEm7JE7cL4df57_VDze37dlVKcTpymmsXYZyJaahmUoqMJD_0Udy8QelKDYDItiCB4hyeTi1wNPtK13CiTanBGr95XNKuGj4U5TR-P_8";
    }

    /**
     * @Given I have the payload:
     */
    public function iHaveThePayload(PyStringNode $string)
    {
        $this->payload = $string;
    }

    /**
     * @When /^I request "(GET|PUT|POST|DELETE|PATCH) ([^"]*)"$/
     */
    public function iRequest($httpMethod, $argument1)
    {
        $client = new GuzzleHttp\Client();
        $this->response = $client->request(
            $httpMethod,
            'http://127.0.0.1:8000' . $argument1,
            [
                'body' => $this->payload,
                'headers' => [
                    "Authorization" => "Bearer {$this->bearerToken}",
                    "Content-Type" => "application/json",
                ],
            ]
        );
        $this->responseBody = $this->response->getBody(true);
    }

    /**
     * @Then /^I get a response$/
     */
    public function iGetAResponse()
    {
        if (empty($this->responseBody)) {
            throw new Exception('Did not get a response from the API');
        }
    }

    /**
     * @Given /^the response is JSON$/
     */
    public function theResponseIsJson()
    {
        $data = json_decode($this->responseBody);

        if (empty($data)) {
            throw new Exception("Response was not JSON\n" . $this->responseBody);
        }
    }
}