<?php

namespace Kallencode\Twitch\Test\Unit;

use Mockery;
use Datetime;
use PHPUnit_Framework_TestCase;
use Kallencode\Twitch\Twitch;
use Illuminate\Support\Collection;
use Kallencode\Twitch\TwitchClient;


class TwitchTest extends PHPUnit_Framework_TestCase
{

    /** @var \TwitchClient */
    protected $twitchClient;

    /** @var \Twitch */
    protected $twitch;

    /** @var \DateTime */
    protected $now;


    public function setUp()
    {
        $this->twitchClient = Mockery::mock(TwitchClient::class);

        $this->twitch = new Twitch($this->twitchClient);

        $this->now = new Datetime('NOW');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    /** @test */
    public function it_can_fetch_channel_by_id()
    {
        $this->twitchClient
            ->shouldReceive('performGetRequest')
            ->once()
            ->andReturn([
                    "_id" => 44322889,
                    "broadcaster_language" => "en",
                    "created_at" => "2013-06-03T19:12:02Z",
                    "display_name" => "dallas",
                    "followers" => 40,
                    "game" => "Final Fantasy XV",
                    "language" => "en",
                    "logo" => "https =>//static-cdn.jtvnw.net/jtv_user_pictures/dallas-profile_image-1a2c906ee2c35f12-300x300.png",
                    "mature" => true,
                    "name" => "dallas",
                    "partner" => false,
                    "profile_banner" => null,
                    "profile_banner_background_color" => null,
                    "status" => "The Finalest of Fantasies",
                    "updated_at" => "2016-12-06T22:02:05Z",
                    "url" => "https://www.twitch.tv/dallas",
                    "video_banner" => null,
                    "views" => 232
                    ]);

        $response = $this->twitch->getChannelById(44322889);

        $this->assertNotNull($response);
    }

    public function test_it_can_fetch_channel_followers()
    {
        $this->twitchClient
            ->shouldReceive('performGetRequest')
            ->once()
            ->andReturn([
               "_cursor" => "1486745757722111000",
               "_total" => 79,
               "follows" => [
               [
                   "created_at" => "2016-12-14T00:32:22.963907Z",
                   "notifications" => false,
                   "user" => [
                       "_id" => "129454141",
                       "bio" => null,
                       "created_at" => "2016-07-13T14:40:42.398257Z",
                       "display_name" => "dallasnchains",
                       "logo" => null,
                       "name" => "dallasnchains",
                       "type" => "user",
                       "updated_at" => "2016-12-14T00:32:16.263122Z"
                   ]
               ]
               ]
           ]);

        $response = $this->twitch->getChannelFollowers(44322889);

        $this->assertNotNull($response);
    }



}
