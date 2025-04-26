<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class General extends BaseService
{
    /**
     * ### Overview

Simply gets if the TorBox API is available for use or not. Also might include information about downtimes.

### Authorization

None needed.
     */
    public function getUpStatus(): Models\GetUpStatusOkResponse
    {
        $data = $this->sendRequest('get', '/', []);

        return Serializer::deserialize($data, Models\GetUpStatusOkResponse::class);
    }

    /**
     * ### Overview

Simply gets general stats about the TorBox service.

### Authorization

None needed.
     */
    public function getStats(string $apiVersion): Models\GetStatsOkResponse
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/stats", []);

        return Serializer::deserialize($data, Models\GetStatsOkResponse::class);
    }

    /**
     * ### Overview

Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for people who want updates on the TorBox changelog. Includes all the necessary items to make this compatible with RSS feed viewers for notifications, and proper HTML viewing.

### Authorization

None needed.
     */
    public function getChangelogsRssFeed(string $apiVersion): mixed
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/changelogs/rss", []);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for developers who want to integrate the changelog into their apps for their users to see. Includes content in HTML and markdown for developers to easily render the text in a fancy yet simple way.

### Authorization

None needed.
     */
    public function getChangelogsJson(string $apiVersion): Models\GetChangelogsJsonOkResponse
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/changelogs/json", []);

        return Serializer::deserialize($data, Models\GetChangelogsJsonOkResponse::class);
    }

    /**
     * ### Overview

Gets CDN speedtest files. This can be used for speedtesting TorBox for users or other usages, such as checking download speeds for verification. Provides all necessary data such as region, server name, and even coordinates. Uses the requesting IP to determine if the server is the closest to the user.  
  
You also have the ability to choose between long tests or short tests via the "test_length" parameter. You may also force the region selection by passing the "region" as a specific region.

### Authorization

None needed.
     */
    public function getSpeedtestFiles(string $apiVersion, string $testLength = null, string $region = null): mixed
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/speedtest", [
            'query' => [
                'test_length' => $testLength,
                'region' => $region,
            ],
        ]);

        return json_decode($data, true);
    }
}
