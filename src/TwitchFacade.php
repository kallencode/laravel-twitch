<?php

namespace Kallencode\Twitch;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kallencode\Twitch\Twitch
 */
class TwitchFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-twitch';
    }
}
