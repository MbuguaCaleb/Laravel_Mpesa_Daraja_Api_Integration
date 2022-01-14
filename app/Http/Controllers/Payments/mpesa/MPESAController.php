<?php

namespace App\Http\Controllers\Payments\mpesa;

use App\Http\Controllers\Controller;


class MPESAController extends Controller
{
    public function getAccessToken(){
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );

        //convert from string to object
        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return $response->access_token;


    }


    public function registerURLS(){

  
      $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
        : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';


      //Mpesa sends the responses to both the Validation and Confirmation URLS.
      $body = array(  
          "ShortCode"=> env('MPESA_SHORTCODE'),
          "ResponseType"=> "Completed",
          "ConfirmationURL"=> env('MPESA_TEST_URL').'/api/confirmation',
          "ValidationURL"=> env('MPESA_TEST_URL').'/api/validation' 
      );

    
      $response = $this->makeHttp($url, $body);

      return $response;

    }
    public function makeHttp($url,$body){
    
      
      $curl = curl_init();
      curl_setopt_array(
          $curl,
          array(
                  CURLOPT_URL => $url,
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '. $this->getAccessToken(),
                    'Content-Type: application/json'
                  ),
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_POST => true,
                  CURLOPT_POSTFIELDS => json_encode($body)
              )
      );
      $curl_response = curl_exec($curl);
      curl_close($curl);
      return $curl_response;
      
    }
}
