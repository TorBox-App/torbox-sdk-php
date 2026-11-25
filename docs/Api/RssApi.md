# TorBox\Sdk\RssApi

For Pro Users you can add RSS feeds which automate adding torrents to your TorBox. If you TorBox becomes full, the torrent will be queued and added at the first chance it gets. Along with adding RSS feeds you are able to control RSS feeds as well as modify existing ones.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addRssFeed()**](RssApi.md#addRssFeed) | **POST** /v1/api/rss/addrss | Add RSS Feed |
| [**controlRssFeed()**](RssApi.md#controlRssFeed) | **POST** /v1/api/rss/controlrss | Control RSS Feed |
| [**editRssFeed()**](RssApi.md#editRssFeed) | **POST** /v1/api/rss/modifyrss | Edit RSS Feed |
| [**getRssFeedItems()**](RssApi.md#getRssFeedItems) | **GET** /v1/api/rss/getfeeditems | Get RSS Feed Items |
| [**getUserRssFeeds()**](RssApi.md#getUserRssFeeds) | **GET** /v1/api/rss/getfeeds | Get User RSS Feeds |


## `addRssFeed()`

```php
addRssFeed($addRss): \TorBox\Sdk\Model\AddRssFeedResponse
```

Add RSS Feed

### Overview  Allows adding an RSS feed to your account. This API gives you a lot of customization options, but is best used with the UI on the website. This endpoint only works for Pro users (plan: 2).  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\RssApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addRss = {"url":"https://example.com/feed.xml","name":"string","do_regex":"string","dont_regex":"string","dont_older_than":0,"scan_interval":0,"pass_check":false,"rss_type":"torrent","torrent_seeding":1}; // \TorBox\Sdk\Model\AddRss

try {
    $result = $apiInstance->addRssFeed($addRss);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RssApi->addRssFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addRss** | [**\TorBox\Sdk\Model\AddRss**](../Model/AddRss.md)|  | |

### Return type

[**\TorBox\Sdk\Model\AddRssFeedResponse**](../Model/AddRssFeedResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `controlRssFeed()`

```php
controlRssFeed($controlRss): \TorBox\Sdk\Model\ControlRssFeedResponse
```

Control RSS Feed

### Overview  Controls an RSS Feed. By sending the RSS feed's ID and the type of operation you want to perform, it will perform said action on the RSS feed checker.  Operations are either:  - **Update** `forces an update on the rss feed` - **Delete** `deletes the rss feed from your account permanently. This also deletes all associated RSS feed items. This does not remove queued items spawned from the RSS feed.` - **Pause** `pauses checking the rss feed on the scan interval` - **Resume** `resumes a paused rss feed`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\RssApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$controlRss = {"operation":"pause","rss_feed_id":0}; // \TorBox\Sdk\Model\ControlRss

try {
    $result = $apiInstance->controlRssFeed($controlRss);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RssApi->controlRssFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **controlRss** | [**\TorBox\Sdk\Model\ControlRss**](../Model/ControlRss.md)|  | |

### Return type

[**\TorBox\Sdk\Model\ControlRssFeedResponse**](../Model/ControlRssFeedResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editRssFeed()`

```php
editRssFeed($modifyRss): \TorBox\Sdk\Model\EditRssFeedResponse
```

Edit RSS Feed

### Overview  Allows you to edit the RSS feed based on the RSS feed ID passed. Allows you to change everything about an RSS feed, except for the URL.  When updating the \"rss_type\" or the \"torrent_seeding\" options, it will update all of the RSS items associated with the RSS feed, including all previous items.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\RssApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$modifyRss = {"rss_feed_id":0,"name":"string","do_regex":"string","dont_regex":"string","dont_older_than":0,"scan_interval":0,"rss_type":"torrent","torrent_seeding":1}; // \TorBox\Sdk\Model\ModifyRss

try {
    $result = $apiInstance->editRssFeed($modifyRss);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RssApi->editRssFeed: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **modifyRss** | [**\TorBox\Sdk\Model\ModifyRss**](../Model/ModifyRss.md)|  | |

### Return type

[**\TorBox\Sdk\Model\EditRssFeedResponse**](../Model/EditRssFeedResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRssFeedItems()`

```php
getRssFeedItems($rssFeedId): \TorBox\Sdk\Model\GetRssFeedItemsResponse
```

Get RSS Feed Items

### Overview  Gets the first 10,000 RSS feed items associated with an RSS feed. RSS feed items are scraped items from the RSS feed. They contain a direct download link as well as the content name, and additional information.  ##### Type Key  The \"type\" key in the response is used for showing what type of downloads this RSS feed item is. This affects how the item is downloaded, as well as what is scraped, so make sure it is correct. When the parent RSS feed's type is changed, it changes all of the items types as well.  - **\"**torrent**\"** `uses .torrent files and magnet links and adds as torrent when downloaded.` - \"usenet\" `uses .nzb files and nzb links and adds as a usenet download when downloaded.` - \"webdl\" `uses generic links and adds as a web download when downloaded.`   ##### Status Key  The \"status\" key tells the status of the RSS feed item. This is useful for seeing what the item is doing, and what it will do next. Each item also includes a \"status_message\" key which gives a user friendly message about anything about the RSS feed item, such as errors and explainations.  - \"new\" `the RSS feed item is set to be downloaded.` - \"ignored\" `the RSS feed item has been ignored due to the parents RSS feed settings, as it doesn't match the chosen settings. The item will not be downloaded.` - \"error\" `the RSS feed item had an error while attempting to download. The item will be retried on the next scrape.` - \"downloaded\" `the RSS feed item has already been downloaded to the user's account. It will not be downloaded again.`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\RssApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rssFeedId = 56; // int | The RSS Feed ID of the RSS Feed you want to retrieve the scraped items of.

try {
    $result = $apiInstance->getRssFeedItems($rssFeedId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RssApi->getRssFeedItems: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rssFeedId** | **int**| The RSS Feed ID of the RSS Feed you want to retrieve the scraped items of. | |

### Return type

[**\TorBox\Sdk\Model\GetRssFeedItemsResponse**](../Model/GetRssFeedItemsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserRssFeeds()`

```php
getUserRssFeeds($id): \TorBox\Sdk\Model\GetUserRssFeedsResponse
```

Get User RSS Feeds

### Overview  Gets all of a user's RSS feeds located on their account. Can only be accessed on a Pro (plan: 2) account. Also allows you to get a specific by passing an \"id\" in the parameters.  ##### Type Key  The \"type\" key in the response is used for showing what type of downloads are spawned from this RSS feed. This affects how the item is downloaded, as well as what is scraped, so make sure it is correct.  - **\"**torrent**\"** `uses .torrent files and magnet links and adds as torrent when downloaded.` - \"usenet\" `uses .nzb files and nzb links and adds as a usenet download when downloaded.` - \"webdl\" `uses generic links and adds as a web download when downloaded.`   ##### Status Key  The \"status\" key tells the user selected status of the RSS feed. These statuses are **not** the same as the status key for the RSS items associated with the RSS feed. Each feed also includes a \"status_message\" key which gives a user friendly message about anything about the RSS feed, such as errors and explainations.  - \"active\" `the RSS feed is set to be scraped.` - \"paused\" `the RSS feed will not be scraped as it is paused by the user.`  - \"error\" `the RSS feed had an error while scraping, and cannot continue.`   ##### State Key  The \"state\" key tells you exactly in real time, what the RSS feed is doing. This is useful for realtime status updates.  - \"idle\" `the RSS feed is idle, and is currently not doing anything in the current moment.` - \"scraping\" `the RSS feed is currently scraping new RSS items.` - \"downloading\" `the RSS feed is currently downloading the newly scraped RSS items.`   ##### Torrent Seeding Key  The \"torrent_seeding\" key is returned with every response, regardless of the type of the RSS feed. This controls what seeding setting the RSS feed is using when it adds new torrents. These are the same options as when adding a torrent using the /torrent/createtorrent endpoint.  > Tells TorBox your preference for seeding this torrent. 1 is auto. 2 is seed. 3 is don't seed. Optional. Default is 1, or whatever the user has in their settings. Overwrites option in settings.   - 1 `auto, the torrent will seed based on what the user has in their settings.` - 2 `always, TorBox will be instructed to seed this torrent regardless of any other settings.` - 3 `never, TorBox will not seed this torrent.`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\RssApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | A specific RSS feed ID that you want to retrieve. Optional.

try {
    $result = $apiInstance->getUserRssFeeds($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RssApi->getUserRssFeeds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| A specific RSS feed ID that you want to retrieve. Optional. | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetUserRssFeedsResponse**](../Model/GetUserRssFeedsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
