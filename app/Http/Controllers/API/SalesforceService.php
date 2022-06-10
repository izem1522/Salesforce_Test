<?php

namespace App\Http\Controllers\API;

use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Log\Logger;

class SalesforceService{
    protected $grant_type = "password";
    protected $username = "soljit_algeria2@soljit.com";
    protected $client_id = "3MVG9I9urWjeUW051PumYX1mbS5HkS3kpZsbCEzYWjgivRyDno1MjvM08EfVf2be52s0vrthHamsgMpQCrm5Z";
    protected $client_secret = "EC97DAFBF9F6F2399DE5E7BADA2E9BBEF6B3B6E832DC435668AA452940AD9501";
    protected $password = "entretient_1235zoLmTaUDLiouUaOAN6WhOQPi";
    protected $endPoint = "https://login.salesforce.com/services/oauth2/token";


    public function callAuthService()
    {
        $client = new Client ();

        $method = "POST";



        $res = $client->request ( $method, $this->endPoint . "?grant_type=" . $this->grant_type ."&username=" . $this->username ."&client_secret=". $this->client_secret. "&password=".$this->password. "&client_id=".$this->client_id);
        return json_decode ( $res->getBody ( true ) );

    }

//    private function callService($method, $endPoint, $query, $objectBridge) {
//
//        $client = new Client ();
//
//
//        $bodyTag = "";
//        if ($method == "POST") {
//            $bodyTag = "body";
//            $query = json_encode ( $query );
//        } else {
//            $bodyTag = "query";
//        }
//
//        $resultBody = new \stdClass ();
//
//        try {
//            $request =  [
//                'headers' => [
//                    'X-P' => $this->apiKey,
//                    'timestamp' => $timestamp,
//                    'signature' => $signature
//                ]];
//            if (is_array ( $query ) && ( str_contains($endPoint, 'cancel'))){
//                $endPoint .=  '?bookingId=' . $query ["bookingId"];
//            }else {
//                $request[$bodyTag] = $query;
//            }
//            $res = $client->request ( $method, $endPoint, $request);
//            $resultBody = json_decode ( $res->getBody ( true ) );
//        } catch ( \GuzzleHttp\Exception\ClientException $e ) {
//            $this->logger->log ( "exception in calling action " . $endPoint . " Response : " . $e->getResponse ()->getBody ()->getContents () );
//        } catch ( GuzzleException $e ) {
//            $this->logger->log ( "exception in calling action " . $endPoint . " Response : " . $e->getResponse ()->getBody ()->getContents () );
//        }
//        $this->logger->log ( "calling action " . $endPoint ." Response : " . json_encode ( $resultBody ) );
//
//        if ($objectBridge){
//            $resultBody = $resultBody;
//            $resultBody = new ObjectBridge($resultBody);
//        }
//
//        return $resultBody;
//
//    }
}
