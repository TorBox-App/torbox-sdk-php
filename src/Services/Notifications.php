<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class Notifications extends BaseService
{
    /**
     * ### Overview

Gets your notifications in an RSS Feed which allows you to use them with RSS Feed readers or notification services that can take RSS Feeds and listen to updates. As soon as a notification goes to your account, it will be added to your feed.

### Authorization

Requires an API key using as a query parameter using the `token` key.
     */
    public function getRssNotificationFeed(string $apiVersion, string $token = null): mixed
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/notifications/rss", [
            'query' => [
                'token' => $token,
            ],
        ]);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Gets your notifications in a JSON object that is easily parsable compared to the RSS Feed. Gives all the same data as the RSS Feed.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getNotificationFeed(string $apiVersion): Models\GetNotificationFeedOkResponse
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/notifications/mynotifications", []);

        return Serializer::deserialize($data, Models\GetNotificationFeedOkResponse::class);
    }

    /**
     * ### Overview

Marks all of your notifications as read and deletes them permanently.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function clearAllNotifications(string $apiVersion): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/notifications/clear", []);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Marks a single notification as read and permanently deletes it from your notifications. Requires a `notification_id` which can be found by getting your notification feed.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function clearSingleNotification(string $apiVersion, string $notificationId): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/notifications/clear/{$notificationId}", []);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Sends a test notification to all enabled notification types. This can be useful for validating setups. No need for any body in this request.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function sendTestNotification(string $apiVersion): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/notifications/test", []);

        return json_decode($data, true);
    }
}
