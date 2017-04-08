<?php

namespace Kallencode\Twitch\Test\Integration;

use Twitch;
use Kallencode\Twitch\Exceptions\InvalidConfiguration;

class TwitchServiceProviderTest extends TestCase
{

    /** @test */
    public function it_will_throw_an_exception_if_clientId_is_not_set()
    {
        $this->app['config']->set('laravel-twitch.clientId', '');
        $this->app['config']->set('laravel-twitch.baseUrl', 'https://example.com');

        $this->setExpectedException(InvalidConfiguration::class);

        Twitch::getChannelById(44322889);
    }

    /** @test */
    public function it_will_throw_an_exception_if_baseUrl_is_not_set()
    {
        $this->app['config']->set('laravel-twitch.clientId', '1234567890');
        $this->app['config']->set('laravel-twitch.baseUrl', '');

        $this->setExpectedException(InvalidConfiguration::class);

        Twitch::getChannelById(44322889);
    }



}
