<?php

namespace Kallencode\Twitch\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{

    public static function clientIdNotSpecified()
    {
        return new static('No clientId was specified. You must provide a valid clientId via the configuration file');
    }

    public static function baseUrlNotSpecified()
    {
        return new static('No baseUrl was specified. You must provide a valid base url via the configuration file');
    }

}
