<?php

namespace Kallencode\Twitch;

class TwitchClientFactory
{

    public static function createForConfig(array $config) : TwitchClient
    {
        $guzzleClient = new \GuzzleHttp\Client;

        $baseUrl = $config['baseUrl'];
        $clientId = $config['clientId'];
        $clientSecret = $config['clientSecret'];

        return new TwitchClient($guzzleClient, $baseUrl, $clientId, $clientSecret);
    }
}
