<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;




class PaymentController extends Controller
{



  public function charge()
  {

    $params = [
      'METHOD'=>'DoDirectPayment',
      'USER'=>"example333_api1.khalij.com",
      'PWD'=> "7Q7RNDW4UA8YECK9",
      'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AprD3l3Z5MNd49P0IFFIu2ubu07a',
      'VERSION' => '56.0',
      'PAYMENTACTION' => 'Sale',
      'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
      'CREDITCARDTYPE' => 'Visa',
      'ACCT' => '4032035295396915',
      'EXPDATE' => '092022',
      'CVV2' => '123',
      'AMT' => '100.30',
      'COUNTRYCODE' => 'US',
      'CURRENCYCODE' => 'USD'

    ];

    $d ='';
    foreach ($params as $key => $value) {
       $d.="&".$key."=".urlencode($value);
    }

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://api-3t.sandbox.paypal.com/nvp");
      curl_setopt($ch, CURLOPT_TIMEOUT, 30);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $d);

      $result = curl_exec($ch);

      return $result;


  }



}
