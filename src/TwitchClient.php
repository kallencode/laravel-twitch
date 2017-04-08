<?php

namespace Kallencode\Twitch;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class TwitchClient
{

    protected $baseUrl;

    protected $client;

    protected $clientId;

    protected $clientSecret;

    protected $oauthToken;

    public function __construct(Client $client, $baseUrl, $clientId,
        $clientSecret = null)
    {
        $this->client = $client;

        $this->baseUrl = $baseUrl;

        $this->clientId = $clientId;

        $this->clientSecret = $clientSecret;
    }

    public function setClientId()
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientSecret(string $clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function setOAuthToken(string $oauthToken)
    {
        $this->oauthToken = $oauthToken;

        return $this;
    }

    public function getOAuthToken()
    {
        return $this->oauthToken;
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function getBaseUrl() : string
    {
        return $this->baseUrl;
    }

    public function performGetRequest(string $resource, array $headers = [], array $query = [])
    {
        return json_decode($this->client->request('GET', "{$this->baseUrl}{$resource}", [
            'headers' => $this->buildHeaders($headers),
            'query' => $query
        ])->getBody()->getContents());
    }

    protected function buildHeaders(array $headers = []) : array
    {
        return array_merge([
            'Client-ID' => $this->getClientId(),
            'Accept' => 'application/vnd.twitchtv.v5+json'
            ], $headers);
    }


}
