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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id'     => '1801225949967824',
        'client_secret' => '82d08ec51b3bec54db777d191d5f643e',
        'redirect'      => 'http://localhost:8000/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => env('j3AECR3WKETTYDjTxHPqW7fV1'),
        'client_secret' => env('Acm96RYGpspbzrCandTrRmSX3rkKf4DVrH2V8w70VvTJ1FAsAX'),
        'redirect'      => env('http://localhost:8000/auth/twitter/callback'),
    ],

    'google' => [
        'client_id'     => env('962049330801-gmr79481tc5og5u2ahata0h024akh5gi.apps.googleusercontent.com'),
        'client_secret' => env('NuH9QW_GceOIFvAG0uUjPaDt'),
        'redirect'      => env('http://localhost:8000/auth/google/callback'),
    ],

];
