<?php

namespace Kallencode\Twitch;

use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;

class Twitch
{
    use Macroable;

    protected $client;

    /**
     * Create a new Twitch Instance.
     */
    public function __construct(TwitchClient $client)
    {
        $this->client = $client;
    }

    public function setClientId(string $clientId)
    {
        $this->client->setClientId($clientId);

        return $this;
    }

    public function getClientId()
    {
        return $this->client->getClientId();
    }

    public function setClientSecret(string $clientSecret)
    {
        $this->client->setClientSecret($clientSecret);

        return $this;
    }

    public function setOAuthToken(string $oauthToken)
    {
        $this->client->setOAuthToken($oauthToken);

        return $this;
    }

    public function getOAuthToken()
    {
        return $this->client->getOAuthToken();
    }

    public function getBaseUrl() : string
    {
        return $this->client->getBaseUrl();
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->client->setBaseUrl($baseUrl);

        return $this;
    }

    /**
     * Get Channel by ID
     *
     * @param  string $channelId Channel ID
     * @return [type]            [description]
     */
    public function getChannelById($channelId)
    {
        return $this->performGetRequest("channels/{$channelId}");
    }


    public function performGetRequest($resource, array $query = [],
                                                       array $headers = [])
    {
        return $this->client->performGetRequest($resource, $headers, $query);
    }

}
