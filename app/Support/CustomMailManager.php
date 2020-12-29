<?php

namespace App\Support;

use Illuminate\Mail\MailManager as BaseMailManager;
use Postmark\ThrowExceptionOnFailurePlugin;
use Postmark\Transport;

class CustomMailManager extends BaseMailManager
{
    /**
     * {@inheritdoc}
     */
    protected function createPostmarkTransport(array $config)
    {
        $headers = isset($config['message_stream_id']) ? [
            'X-PM-Message-Stream' => $config['message_stream_id'],
        ] : [];

        return tap(new Transport(
            $config['token'],
            $headers
        ), function ($transport) {
            $transport->registerPlugin(new ThrowExceptionOnFailurePlugin());
        });
    }
}
