<?php

return [

    'mailers' => [
        'postmark' => [
            'transport' => 'postmark',
            'token' => env('POSTMARK_SERVER_CRBLOG_TOKEN'),
            // 'message_stream_id' => null,
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'postmark_transx_crblog' => [
            'transport' => 'postmark',
            'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID_TRANSX_CRBLOG'),
            'token' => env('POSTMARK_SERVER_CRBLOG_TOKEN')
        ],

        'postmark_broadcast_crblog' => [
            'transport' => 'postmark',
            'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID_BROADCAST_CRBLOG'),
            'token' => env('POSTMARK_SERVER_CRBLOG_TOKEN')
        ],

        'postmark_transx_mp' => [
            'transport' => 'postmark',
            'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID_TRANSX_MP'),
            'token' => env('POSTMARK_SERVER_MP_TOKEN')
        ],

        'postmark_broadcast_mp' => [
            'transport' => 'postmark',
            'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID_BROADCAST_MP'),
            'token' => env('POSTMARK_SERVER_MP_TOKEN')
        ],

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],
    ],

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
