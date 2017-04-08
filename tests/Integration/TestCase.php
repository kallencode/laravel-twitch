<?php

namespace Kallencode\Twitch\Test\Integration;

use Kallencode\Twitch\TwitchFacade;
use Kallencode\Twitch\TwitchServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            TwitchServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Twitch' => TwitchFacade::class,
        ];
    }
}
