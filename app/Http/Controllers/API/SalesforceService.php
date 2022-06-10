<?php

namespace App\Http\Controllers\API;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Log\Logger;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

class SalesforceService{
    protected $grant_type = "password";
    protected $username = "soljit_algeria2@soljit.com";
    protected $client_id = "3MVG9I9urWjeUW051PumYX1mbS5HkS3kpZsbCEzYWjgivRyDno1MjvM08EfVf2be52s0vrthHamsgMpQCrm5Z";
    protected $client_secret = "EC97DAFBF9F6F2399DE5E7BADA2E9BBEF6B3B6E832DC435668AA452940AD9501";
    protected $password = "entretient_1235zoLmTaUDLiouUaOAN6WhOQPi";
    protected $endPoint = "https://login.salesforce.com/services/oauth2/token";
    protected $bearerToken = "00D4L000000gmbH!AQsAQDil_fWXoehsY_QDi0oRjfEuJp2aZzSUkkPWQv9W9MxUvEuJ4B_zvnXTgj_g7GS5woLpgmbPEBeHAFdDER451bfln0BX";


    public function callAuthService()
    {
        $client = new Client ();

        $method = "POST";



        $res = $client->request ( $method, $this->endPoint . "?grant_type=" . $this->grant_type ."&username=" . $this->username ."&client_secret=". $this->client_secret. "&password=".$this->password. "&client_id=".$this->client_id);
        return json_decode ( $res->getBody ( true ) );

    }

    protected function callGetCandidatesById($id) {
        $endpoint = 'https://soljit35-dev-ed.my.salesforce.com' . '/services/data/v54.0/sobjects/Candidature__c/' . $id; //TODO change this to dynamic
        $method = "GET";
        return $this->callService($endpoint, $method, null);
    }



    private function callService($endPoint, $method , $query ) {
        $client = new Client ();


        $bodyTag = "";
        if ($method == "POST") {
            $bodyTag = "body";
        } else {
            $bodyTag = "query";
        }

        $resultBody = new \stdClass ();


        $request =  [
            'headers' => [
                'Authorization' => "Bearer " . $this->bearerToken,
            ]];
        $query ?? $request[$bodyTag] = $query;
        $res = $client->request ( $method, $endPoint, $request);
        $resultBody = json_decode ( $res->getBody ( true ) );


        return $resultBody;

    }
}
