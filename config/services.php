<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'toyyibpay' => [
        'sandbox' => env('TOYYIBPAY_SANDBOX', true),
        'secret' => env('TOYYIBPAY_SECRET'),
        'category' => env('TOYYIBPAY_CATEGORY'),

        'callback_url' => env('APP_ENV') === 'local'
            ? env('TOYYIBPAY_CALLBACK_URL_LOCAL')
            : env('TOYYIBPAY_CALLBACK_URL_PROD'),

        'return_url' => env('APP_ENV') === 'local'
            ? env('TOYYIBPAY_RETURN_URL_LOCAL')
            : env('TOYYIBPAY_RETURN_URL_PROD'),
    ],


];
