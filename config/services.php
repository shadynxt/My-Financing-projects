<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id'     => '317641132034805',
    'client_secret' => '8ee66cd64fa553fb5495ac99743e8179',
    'redirect'      => 'http://edamny.com/login/facebook/callback',
   ],

   'twitter' => [
   'client_id'     => 'uFXt9fbkmrGBbx8IbAB3JugKb',
   'client_secret' => '3givOMrjGmFPrVfwTHHupDEI2PBahnjimHoWDGYTVq1DTVtBrv',
   'redirect'      => 'http://edamny.com/login/twitter/callback',
  ],

];
