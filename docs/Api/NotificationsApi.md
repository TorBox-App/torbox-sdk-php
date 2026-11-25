# TorBox\Sdk\NotificationsApi

Notifications are important for TorBox to always know what is happening with your account or your torrents. This route allows your to get and view your notifications.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**clearAllNotifications()**](NotificationsApi.md#clearAllNotifications) | **POST** /v1/api/notifications/clear | Clear All Notifications |
| [**clearSingleNotification()**](NotificationsApi.md#clearSingleNotification) | **POST** /v1/api/notifications/clear/{id} | Clear Single Notification |
| [**getNotificationFeed()**](NotificationsApi.md#getNotificationFeed) | **GET** /v1/api/notifications/mynotifications | Get Notification Feed |
| [**getRssNotificationFeed()**](NotificationsApi.md#getRssNotificationFeed) | **GET** /v1/api/notifications/rss | Get RSS Notification Feed |
| [**sendTestNotification()**](NotificationsApi.md#sendTestNotification) | **POST** /v1/api/notifications/test | Send Test Notification |


## `clearAllNotifications()`

```php
clearAllNotifications(): \TorBox\Sdk\Model\ClearAllNotificationsResponse
```

Clear All Notifications

### Overview  Marks all of your notifications as read and deletes them permanently.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\NotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->clearAllNotifications();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->clearAllNotifications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\ClearAllNotificationsResponse**](../Model/ClearAllNotificationsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `clearSingleNotification()`

```php
clearSingleNotification($id): \TorBox\Sdk\Model\ClearSingleNotificationResponse
```

Clear Single Notification

### Overview  Marks a single notification as read and permanently deletes it from your notifications. Requires a `notification_id` which can be found by getting your notification feed.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\NotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->clearSingleNotification($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->clearSingleNotification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\TorBox\Sdk\Model\ClearSingleNotificationResponse**](../Model/ClearSingleNotificationResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNotificationFeed()`

```php
getNotificationFeed($bypassCache): \TorBox\Sdk\Model\GetNotificationFeedResponse
```

Get Notification Feed

### Overview  Gets your notifications in a JSON object that is easily parsable compared to the RSS Feed. Gives all the same data as the RSS Feed.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\NotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bypassCache = false; // bool

try {
    $result = $apiInstance->getNotificationFeed($bypassCache);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->getNotificationFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bypassCache** | **bool**|  | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\GetNotificationFeedResponse**](../Model/GetNotificationFeedResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRssNotificationFeed()`

```php
getRssNotificationFeed($token): string
```

Get RSS Notification Feed

### Overview  Gets your notifications in an RSS Feed which allows you to use them with RSS Feed readers or notification services that can take RSS Feeds and listen to updates. As soon as a notification goes to your account, it will be added to your feed.  ### Authorization  Requires an API key using as a query parameter using the `token` key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\NotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | The user's API key.

try {
    $result = $apiInstance->getRssNotificationFeed($token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->getRssNotificationFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| The user&#39;s API key. | |

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendTestNotification()`

```php
sendTestNotification(): \TorBox\Sdk\Model\SendTestNotificationResponse
```

Send Test Notification

### Overview  Sends a test notification to all enabled notification types. This can be useful for validating setups. No need for any body in this request.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\NotificationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->sendTestNotification();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NotificationsApi->sendTestNotification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\SendTestNotificationResponse**](../Model/SendTestNotificationResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
