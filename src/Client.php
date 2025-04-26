<?php

declare(strict_types=1);

namespace TorboxApi;

use TorboxApi\Services;

class Client
{
    public $torrents;
    public $usenet;
    public $webDownloadsDebrid;
    public $general;
    public $notifications;
    public $user;
    public $rssFeeds;
    public $integrations;
    public $queued;

    public function __construct(
        string $accessToken,
        string $tokenPrefix = 'Bearer ',
        string $environment = Environment::Default,
        float $timeout = 0
    ) {
        $this->torrents = new Services\Torrents($accessToken, $tokenPrefix, $environment, $timeout);
        $this->usenet = new Services\Usenet($accessToken, $tokenPrefix, $environment, $timeout);
        $this->webDownloadsDebrid = new Services\WebDownloadsDebrid($accessToken, $tokenPrefix, $environment, $timeout);
        $this->general = new Services\General($accessToken, $tokenPrefix, $environment, $timeout);
        $this->notifications = new Services\Notifications($accessToken, $tokenPrefix, $environment, $timeout);
        $this->user = new Services\User($accessToken, $tokenPrefix, $environment, $timeout);
        $this->rssFeeds = new Services\RssFeeds($accessToken, $tokenPrefix, $environment, $timeout);
        $this->integrations = new Services\Integrations($accessToken, $tokenPrefix, $environment, $timeout);
        $this->queued = new Services\Queued($accessToken, $tokenPrefix, $environment, $timeout);
    }

    public function setBaseUrl(string $url)
    {
        $this->torrents->setBaseUrl($url);
        $this->usenet->setBaseUrl($url);
        $this->webDownloadsDebrid->setBaseUrl($url);
        $this->general->setBaseUrl($url);
        $this->notifications->setBaseUrl($url);
        $this->user->setBaseUrl($url);
        $this->rssFeeds->setBaseUrl($url);
        $this->integrations->setBaseUrl($url);
        $this->queued->setBaseUrl($url);
    }

    public function setAccessToken(string $accessToken)
    {
        $this->torrents->setAccessToken($accessToken);
        $this->usenet->setAccessToken($accessToken);
        $this->webDownloadsDebrid->setAccessToken($accessToken);
        $this->general->setAccessToken($accessToken);
        $this->notifications->setAccessToken($accessToken);
        $this->user->setAccessToken($accessToken);
        $this->rssFeeds->setAccessToken($accessToken);
        $this->integrations->setAccessToken($accessToken);
        $this->queued->setAccessToken($accessToken);
    }
}

// c029837e0e474b76bc487506e8799df5e3335891efe4fb02bda7a1441840310c
