<?php

namespace App\Slack;

use GuzzleHttp\Client;

class SlackMessage
{
    /**
     * @param string $incomingWebhook
     * @param array $payload
     */
    protected function send($incomingWebhook, $payload)
    {
        $client = new Client();

        $client->request('POST', $incomingWebhook, [
            'json' => $payload,
        ]);
    }
}
