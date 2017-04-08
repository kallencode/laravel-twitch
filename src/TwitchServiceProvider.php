<?php

namespace Kallencode\Twitch;

use Illuminate\Support\ServiceProvider;
use Kallencode\Twitch\Exceptions\InvalidConfiguration;

class TwitchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-twitch.php' =>
                    config_path('laravel-twitch.php'),
            ], 'config');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-twitch.php', 'laravel-twitch');

        $config = config('laravel-twitch');

        $this->app->bind(TwitchClient::class, function() use ($config) {
            return TwitchClientFactory::createForConfig($config);
        });

        $this->app->bind(Twitch::class, function() use ($config) {
            $this->guardAgainstInvalidConfig($config);
            $client = app(TwitchClient::class);

            return new Twitch($client);
        });

        $this->app->alias(Twitch::class, 'laravel-twitch');
    }

    /**
     * @param  array|null $config
     *
     * @throws \Kallencode\Twitch\Exceptions\InvalidConfiguration
     */
    public function guardAgainstInvalidConfig($config)
    {
        if(empty($config['baseUrl'])) {
            throw InvalidConfiguration::baseUrlNotSpecified();
        }
        if(empty($config['clientId'])) {
            throw InvalidConfiguration::clientIdNotSpecified();
        }
    }


}
