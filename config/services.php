<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'authy' => [
        'secret' => env('AUTHY_SECRET'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN', 'surveyr.io'),
        'secret' => env('MAILGUN_SECRET', '76ff1beb7a8951658ed246eccd3c2899-5d9bd83c-2f0de58f'),
    ],
    // 'secret' => env('MAILGUN_SECRET', 'key-3xv3wnk9grseh6z2wito40sh4z2jdao2'),

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'slack' => [
        'client_id'     => env('SLACK_CLIENT_ID', '48465569348.583420000161'),
        'client_secret' => env('SLACK_CLIENT_SECRET', '0979cf52fbbc21f4ada4355c34dc23aa'),
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
