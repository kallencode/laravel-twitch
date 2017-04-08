# Laravel Twitch

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kallencode/laravel-twitch.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-twitch)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/kallencode/laravel-twitch/master.svg?style=flat-square)](https://travis-ci.org/kallencode/laravel-twitch)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/xxxxxxxxx.svg?style=flat-square)](https://insight.sensiolabs.com/projects/xxxxxxxxx)
[![Quality Score](https://img.shields.io/scrutinizer/g/kallencode/laravel-twitch.svg?style=flat-square)](https://scrutinizer-ci.com/g/kallencode/laravel-twitch)
[![Total Downloads](https://img.shields.io/packagist/dt/kallencode/laravel-twitch.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-twitch)

Simple package for interacting with the [Twitch v5 API](https://dev.twitch.tv/docs/)

## Installation

You can install the package via composer:

``` bash
composer require kallencode/laravel-twitch
```

Install the ServiceProvider.

```php
// config/app.php
'providers' => [
    ...
    Kallencode\Twitch\TwitchServiceProvider::class,
    ...
];
```

This package also comes with a facade:

```php
// config/app.php
'aliases' => [
    ...
    'Twitch' => Kallencode\Twitch\TwitchFacade::class,
    ...
];
```

You can publish the config file of this package with this command:

```php
php artisan vendor:publish --provider="Kallencode\Twitch\TwitchServiceProvider"
```

The following config file will be published in `config/laravel-twitch.php`

```php
return [

    'clientId' => env('TWITCH_CLIENT_ID'),

    'baseUrl' => env('TWITCH_BASE_URL','https://api.twitch.tv/kraken/')

];
```

## Usage

``` php
$channel = Twitch::getChannelById(44322889);

```

## Finding your Client ID

Go to [https://www.twitch.tv/settings/connections](https://www.twitch.tv/settings/connections)

Scroll to the bottom of the page and register your application under Developer Applications.

Copy the Client ID and set the `TWITCH_CLIENT_ID` environment variable.


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@kallencode.nl instead of using the issue tracker.

## Credits

- [Roelof Kallenkoot](https://github.com/rkallenkoot)
- [All Contributors](../../contributors)

## About Kallencode
[Kallencode](https://kallencode.nl)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
