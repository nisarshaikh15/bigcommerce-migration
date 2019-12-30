<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utils;

/**
 * Description of BigCommerce
 *
 * @author user
 */
class BigCommerce {
    public static function createProduct($productData) {
        
        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v3/catalog/products",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 300,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $productData,
                CURLOPT_HTTPHEADER => array(
                  "accept: application/json",
                  "access-control-allow-credentials: true",
                  "access-control-allow-origin: *",
                  "content-type: application/json",
                  "x-auth-client: ".CLIENT_ID,
                  "x-auth-token: ".AUTH_TOKEN
                ),
              ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            
            if ($err) {
                \Cake\Log\Log::info('Error while adding products %s'.$err);
                echo json_encode($err);
              return NULL;
            } else {
                \Cake\Log\Log::info('response while adding products %s'.$response);
                echo json_encode($response);
              return json_decode($response);
            }
    }
    
    public static function getProductOptions($productId) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.bigcommerce.com/stores/dtqhl933vb/v3/catalog/products/".$productId."/options",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "x-auth-client: dlabt7o129ofx3mfoq7jgqj2l9yibks",
            "x-auth-token: tcf7ruoha459kp40h0hhl2a42ecblfb"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    
    public static function updateProductOptions($productId,$productOptionId) {
        $curl = curl_init();
        echo 'ProductId ==> '. json_encode($productId) . " OptionId => ". json_encode($productOptionId);
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v3/catalog/products/$productId/options/$productOptionId",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 300,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "PUT",
          CURLOPT_POSTFIELDS => "{\"type\":\"dropdown\"}",
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            "x-auth-client: ".CLIENT_ID,
            "x-auth-token: ".AUTH_TOKEN
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    
    public static function createCustomer($customerData) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v3/customers",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $customerData,
          CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            "x-auth-client: ".CLIENT_ID,
            "x-auth-token: ".AUTH_TOKEN
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return json_decode($response);
        }
    }
    
    public static function createOrder($orderData) {
        $curl = curl_init();

        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v2/orders",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $orderData,
  CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            "x-auth-client:".CLIENT_ID,
            "x-auth-token: ".AUTH_TOKEN
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}
