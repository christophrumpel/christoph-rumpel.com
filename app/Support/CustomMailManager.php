<?php

namespace App\Support;

use Postmark\Transport;
use Postmark\ThrowExceptionOnFailurePlugin;
use Illuminate\Mail\MailManager as BaseMailManager;

class CustomMailManager extends BaseMailManager
{
    /**
     * {@inheritdoc}
     */
    protected function createPostmarkTransport(array $config)
    {
        $headers =  isset($config['message_stream_id']) ? [
            'X-PM-Message-Stream' => $config['message_stream_id'],
        ] : [];

        return tap(new Transport(
            $config['token'], $headers
        ), function ($transport) {
            $transport->registerPlugin(new ThrowExceptionOnFailurePlugin());
        });
    }
}
