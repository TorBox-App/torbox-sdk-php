# TorBox\Sdk\GeneralApi

These are the general endpoints for TorBox. They aren&#39;t mission critical, but if your app or service needs them, they are here.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**get30DayStats()**](GeneralApi.md#get30DayStats) | **GET** /v1/api/stats/30days | Get 30 Day Stats |
| [**getChangelogsJson()**](GeneralApi.md#getChangelogsJson) | **GET** /v1/api/changelogs/json | Get Changelogs JSON |
| [**getChangelogsRssFeed()**](GeneralApi.md#getChangelogsRssFeed) | **GET** /v1/api/changelogs/rss | Get Changelogs RSS Feed |
| [**getSpeedtestFiles()**](GeneralApi.md#getSpeedtestFiles) | **GET** /v1/api/speedtest | Get Speedtest Files |
| [**getStats()**](GeneralApi.md#getStats) | **GET** /v1/api/stats | Get Stats |
| [**getUpStatus()**](GeneralApi.md#getUpStatus) | **GET** / | Get Up Status |


## `get30DayStats()`

```php
get30DayStats(): \TorBox\Sdk\Model\Get30DayStatsResponse
```

Get 30 Day Stats

### Overview  Gets the general stats of the TorBox service for the last 30 days, one entry per day. Each entry is a snapshot of the totals at that time.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->get30DayStats();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->get30DayStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\Get30DayStatsResponse**](../Model/Get30DayStatsResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChangelogsJson()`

```php
getChangelogsJson($offset, $limit): \TorBox\Sdk\Model\GetChangelogsJsonResponse
```

Get Changelogs JSON

### Overview  Gets most recent changelogs from [https://feedback.torbox.app/changelog](https://feedback.torbox.app/changelog). This is useful for developers who want to integrate the changelog into their apps for their users to see. Includes content in HTML for developers to easily render the text in a fancy yet simple way.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$offset = 0; // int
$limit = 10; // int

try {
    $result = $apiInstance->getChangelogsJson($offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->getChangelogsJson: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**|  | [optional] [default to 0] |
| **limit** | **int**|  | [optional] [default to 10] |

### Return type

[**\TorBox\Sdk\Model\GetChangelogsJsonResponse**](../Model/GetChangelogsJsonResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChangelogsRssFeed()`

```php
getChangelogsRssFeed($offset, $limit): string
```

Get Changelogs RSS Feed

### Overview  Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog](https://feedback.torbox.app/changelog). This is useful for people who want updates on the TorBox changelog. Includes all the necessary items to make this compatible with RSS feed viewers for notifications, and proper HTML viewing.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$offset = 0; // int
$limit = 10; // int

try {
    $result = $apiInstance->getChangelogsRssFeed($offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->getChangelogsRssFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**|  | [optional] [default to 0] |
| **limit** | **int**|  | [optional] [default to 10] |

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

## `getSpeedtestFiles()`

```php
getSpeedtestFiles($userIp, $region, $testLength): \TorBox\Sdk\Model\GetSpeedtestFilesResponse
```

Get Speedtest Files

### Overview  Gets CDN speedtest files. This can be used for speedtesting TorBox for users or other usages, such as checking download speeds for verification. Provides all necessary data such as region, server name, and even coordinates. Uses the requesting IP to determine if the server is the closest to the user.  You also have the ability to choose between long tests or short tests via the \"test_length\" parameter. You may also force the region selection by passing the \"region\" as a specific region.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$userIp = 'userIp_example'; // string | Pass a user's IP to get the closest server to them, otherwise will use the calling IP for location.
$region = 'all'; // string | Determines what cdns are returned. May be any region that TorBox is located in. To get this value, send a request without this value to determine all of the available regions that are available.
$testLength = 'short'; // string | Determines the size of the file used for the speedtest. May be \"long\" or \"short\". Optional.

try {
    $result = $apiInstance->getSpeedtestFiles($userIp, $region, $testLength);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->getSpeedtestFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **userIp** | **string**| Pass a user&#39;s IP to get the closest server to them, otherwise will use the calling IP for location. | [optional] |
| **region** | **string**| Determines what cdns are returned. May be any region that TorBox is located in. To get this value, send a request without this value to determine all of the available regions that are available. | [optional] [default to &#39;all&#39;] |
| **testLength** | **string**| Determines the size of the file used for the speedtest. May be \&quot;long\&quot; or \&quot;short\&quot;. Optional. | [optional] [default to &#39;short&#39;] |

### Return type

[**\TorBox\Sdk\Model\GetSpeedtestFilesResponse**](../Model/GetSpeedtestFilesResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStats()`

```php
getStats(): \TorBox\Sdk\Model\GetStatsResponse
```

Get Stats

### Overview  Simply gets general stats about the TorBox service.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getStats();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->getStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetStatsResponse**](../Model/GetStatsResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUpStatus()`

```php
getUpStatus(): \TorBox\Sdk\Model\GetUpStatusResponse
```

Get Up Status

### Overview  Simply gets if the TorBox API is available for use or not. Also might include information about downtimes.  ### Authorization  None needed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\GeneralApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getUpStatus();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GeneralApi->getUpStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetUpStatusResponse**](../Model/GetUpStatusResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
