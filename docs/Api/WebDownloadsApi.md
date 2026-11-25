# TorBox\Sdk\WebDownloadsApi

Web Downloads are another use of TorBox. Adding links such as images, Youtube videos and more can be an easy way to download them and add them to your device. This API is practically the same as the Usenet and Torrents API.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**asyncCreateWebDownload()**](WebDownloadsApi.md#asyncCreateWebDownload) | **POST** /v1/api/webdl/asynccreatewebdownload | Async Create Web Download |
| [**controlWebDownload()**](WebDownloadsApi.md#controlWebDownload) | **POST** /v1/api/webdl/controlwebdownload | Control Web Download |
| [**createWebDownload()**](WebDownloadsApi.md#createWebDownload) | **POST** /v1/api/webdl/createwebdownload | Create Web Download |
| [**editWebDownloadItem()**](WebDownloadsApi.md#editWebDownloadItem) | **PUT** /v1/api/webdl/editwebdownload | Edit Web Download Item |
| [**getHosterList()**](WebDownloadsApi.md#getHosterList) | **GET** /v1/api/webdl/hosters | Get Hoster List |
| [**getWebDownloadCachedAvailability()**](WebDownloadsApi.md#getWebDownloadCachedAvailability) | **GET** /v1/api/webdl/checkcached | Get Web Download Cached Availability |
| [**getWebDownloadCachedAvailabilityBatch()**](WebDownloadsApi.md#getWebDownloadCachedAvailabilityBatch) | **POST** /v1/api/webdl/checkcached | Get Web Download Cached Availability Batch |
| [**getWebDownloadList()**](WebDownloadsApi.md#getWebDownloadList) | **GET** /v1/api/webdl/mylist | Get Web Download List |
| [**requestWebDownloadLink()**](WebDownloadsApi.md#requestWebDownloadLink) | **GET** /v1/api/webdl/requestdl | Request Download Link |
| [**requestWebDownloadLinksGet()**](WebDownloadsApi.md#requestWebDownloadLinksGet) | **GET** /v1/api/webdl/requestdl/batch | Request Download Links - GET |
| [**requestWebDownloadLinksPost()**](WebDownloadsApi.md#requestWebDownloadLinksPost) | **POST** /v1/api/webdl/requestdl/batch | Request Download Links - POST |


## `asyncCreateWebDownload()`

```php
asyncCreateWebDownload($link, $password, $name, $asQueued, $addOnlyIfCached): \TorBox\Sdk\Model\AsyncCreateWebDownloadResponse
```

Async Create Web Download

### Overview  Creates a web download asynchronously under your account. Simply send a link to any file on the internet. Once it has been checked, it will begin downloading assuming your account has available active download slots, and they aren't too large.  The request will return instantly, not returning any data other than a success message. This is the same for failures, as they will return the error in the background as a notification, rather than immediately.  ### Rate Limits  This endpoint is rate limited to **60 requests per hour** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$link = 'link_example'; // string | An accessible link to any file on the internet. Cannot be a redirection.
$password = 'password_example'; // string | Password to the file, if the files requires it. Optional.
$name = 'name_example'; // string | The name you want the web download to be. Optional.
$asQueued = false; // bool | Tells TorBox you want this web download instantly queued. Optional.
$addOnlyIfCached = false; // bool | Only adds the download if it is cached on TorBox. If not cached, it won't be added.

try {
    $result = $apiInstance->asyncCreateWebDownload($link, $password, $name, $asQueued, $addOnlyIfCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->asyncCreateWebDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **link** | **string**| An accessible link to any file on the internet. Cannot be a redirection. | |
| **password** | **string**| Password to the file, if the files requires it. Optional. | [optional] |
| **name** | **string**| The name you want the web download to be. Optional. | [optional] |
| **asQueued** | **bool**| Tells TorBox you want this web download instantly queued. Optional. | [optional] [default to false] |
| **addOnlyIfCached** | **bool**| Only adds the download if it is cached on TorBox. If not cached, it won&#39;t be added. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\AsyncCreateWebDownloadResponse**](../Model/AsyncCreateWebDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `controlWebDownload()`

```php
controlWebDownload($controlWebDownload): \TorBox\Sdk\Model\ControlWebDownloadResponse
```

Control Web Download

### Overview  Controls a web download. By sending the web download's ID and the type of operation you want to perform, it will send that request to the debrid client.  Operations are either:  - **Delete** `deletes the download from the client and your account permanently`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$controlWebDownload = {"webdl_id":1,"operation":"delete","all":false}; // \TorBox\Sdk\Model\ControlWebDownload

try {
    $result = $apiInstance->controlWebDownload($controlWebDownload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->controlWebDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **controlWebDownload** | [**\TorBox\Sdk\Model\ControlWebDownload**](../Model/ControlWebDownload.md)|  | |

### Return type

[**\TorBox\Sdk\Model\ControlWebDownloadResponse**](../Model/ControlWebDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createWebDownload()`

```php
createWebDownload($link, $password, $name, $asQueued, $addOnlyIfCached): \TorBox\Sdk\Model\CreateWebDownloadResponse
```

Create Web Download

### Overview  Creates a web download under your account. Simply send a link to any file on the internet. Once it has been checked, it will begin downloading assuming your account has available active download slots, and they aren't too large.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$link = 'link_example'; // string | An accessible link to any file on the internet. Cannot be a redirection.
$password = 'password_example'; // string | Password to the file, if the files requires it. Optional.
$name = 'name_example'; // string | The name you want the torrent to be. Optional.
$asQueued = false; // bool | Tells TorBox you want this web download.instantly queued. Optional.
$addOnlyIfCached = false; // bool | Only adds the download if it is cached on TorBox. If not cached, it won't be added.

try {
    $result = $apiInstance->createWebDownload($link, $password, $name, $asQueued, $addOnlyIfCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->createWebDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **link** | **string**| An accessible link to any file on the internet. Cannot be a redirection. | |
| **password** | **string**| Password to the file, if the files requires it. Optional. | [optional] |
| **name** | **string**| The name you want the torrent to be. Optional. | [optional] |
| **asQueued** | **bool**| Tells TorBox you want this web download.instantly queued. Optional. | [optional] [default to false] |
| **addOnlyIfCached** | **bool**| Only adds the download if it is cached on TorBox. If not cached, it won&#39;t be added. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\CreateWebDownloadResponse**](../Model/CreateWebDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editWebDownloadItem()`

```php
editWebDownloadItem($editWebDownload): \TorBox\Sdk\Model\EditWebDownloadItemResponse
```

Edit Web Download Item

### Overview  Updates a download item based on the item's ID. Sending a PUT request with valid items overwrites the previous items entirely, so use this endpoint with caution. Please make sure to read the restrictions below as they are important.  ### Restrictions  - Does not affect the cached database (or any other user's item).  - Name must pass validation:      - Above 1 character long.      - Below 200 characters long.      - Cannot contain any non-url or non filesystem safe characters. (This is removed automatically).      - Cannot contain any leading or trailing whitespace. You can have spaces in the middle. (This is removed automatically).  - Tags follow the same rules as the name.  - Alternative hashes must be of MD5, SHA1, or SHA256.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$editWebDownload = {"webdl_id":0,"name":"string","tags":["string"],"alternative_hashes":["0123456789abcdef0123456789abcdef01234567"],"airlocked":false}; // \TorBox\Sdk\Model\EditWebDownload

try {
    $result = $apiInstance->editWebDownloadItem($editWebDownload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->editWebDownloadItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **editWebDownload** | [**\TorBox\Sdk\Model\EditWebDownload**](../Model/EditWebDownload.md)|  | |

### Return type

[**\TorBox\Sdk\Model\EditWebDownloadItemResponse**](../Model/EditWebDownloadItemResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHosterList()`

```php
getHosterList(): \TorBox\Sdk\Model\GetHosterListResponse
```

Get Hoster List

### Overview  A dynamic list of hosters that TorBox is capable of downloading through its paid service.  - **Name** - a clean name for display use, the well known name of the service, should be recognizable to users.  - **Domains** - an array of known domains that the hoster uses. While each may serve a different purpose it is still included.  - **URL** - the main url of the service. This should take you to the home page or a service page of the hoster.  - **Icon** - a square image, usually a favicon or logo, that represents the service, should be recognizable as the hoster's icon.  - **Status** - whether this hoster can be used on TorBox or not at the current time. It is usually a good idea to check this value before submitting a download to TorBox's servers for download.  - **Type** - values are either \"hoster\" or \"stream\". Both do the same thing, but is good to differentiate services used for different things.  - **Note** - a string value (or null) that may give helpful information about the current status or state of a hoster. This can and should be shown to end users.  - **Daily Link Limit** - the number of downloads a user can use per day. As a user submits links, once they hit this number, the API will deny them from adding anymore of this type of link. A zero value means that it is unlimited.  - **Daily Link Used** - the number of downloads a user has already used. Usually zero unless you send authentication to the endpoint. This will return accurate values.  - **Daily Bandwidth Limit** - the value in bytes that a user is allowed to download from this hoster. A zero value means that it is unlimited. It is recommended to use the Daily Link Limit instead.  - **Daily Bandwidth Used** - the value in bytes that a user has already used to download from this hoster. Usually zero unless you send authentication to the endpoint. This will return accurate values.   ### Authorization  Optional authorization. Authorization is not required in this endpoint unless you want to get the user's live data. Requires an API key using the Authorization Bearer Header to get the live and accurate data for **Daily Link Used** and **Daily Bandwidth Used**.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getHosterList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->getHosterList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetHosterListResponse**](../Model/GetHosterListResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebDownloadCachedAvailability()`

```php
getWebDownloadCachedAvailability($hash, $format, $listFiles, $checkCached): \TorBox\Sdk\Model\GetWebDownloadCachedAvailabilityResponse
```

Get Web Download Cached Availability

### Overview  Takes in a list of comma separated usenet hashes and checks if the web download is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as: `?hash=XXXX&hash=XXXX&hash=XXXX`  or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX` and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.  You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.  To get the hash of a web download you can read [this document](https://support.torbox.app/en/articles/13681109-technical-getting-hashes-for-searches) for all of the strategies.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hash = array('hash_example'); // string[] | The list of web hashes you want to check. Comma seperated. To find the hash, md5 the link.
$format = 'object'; // string | Format you want the data in. Acceptable is either \"object\" or \"list\". List is the most performant option as it doesn't require modification of the list.
$listFiles = false; // bool | Allows you to list the files found inside the cached data.
$checkCached = new \TorBox\Sdk\Model\CheckCached(); // \TorBox\Sdk\Model\CheckCached

try {
    $result = $apiInstance->getWebDownloadCachedAvailability($hash, $format, $listFiles, $checkCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->getWebDownloadCachedAvailability: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hash** | [**string[]**](../Model/string.md)| The list of web hashes you want to check. Comma seperated. To find the hash, md5 the link. | [optional] |
| **format** | **string**| Format you want the data in. Acceptable is either \&quot;object\&quot; or \&quot;list\&quot;. List is the most performant option as it doesn&#39;t require modification of the list. | [optional] [default to &#39;object&#39;] |
| **listFiles** | **bool**| Allows you to list the files found inside the cached data. | [optional] [default to false] |
| **checkCached** | [**\TorBox\Sdk\Model\CheckCached**](../Model/CheckCached.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetWebDownloadCachedAvailabilityResponse**](../Model/GetWebDownloadCachedAvailabilityResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebDownloadCachedAvailabilityBatch()`

```php
getWebDownloadCachedAvailabilityBatch($hash, $format, $listFiles, $checkCached): \TorBox\Sdk\Model\GetWebDownloadCachedAvailabilityBatchResponse
```

Get Web Download Cached Availability Batch

### Overview  Takes in a list of comma separated hashes and checks if the torrent is cached. With the POST endpoint you can submit a nearly unlimited hashes compared to the GET endpoint which is limited by url parameters.  Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.  You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hash = array('hash_example'); // string[]
$format = 'object'; // string | Format you want the data in. Acceptable is either \"object\" or \"list\". List is the most performant option as it doesn't require modification of the list.
$listFiles = false; // bool | Allows you to list the files found inside the cached data.
$checkCached = {"hashes":["string"]}; // \TorBox\Sdk\Model\CheckCached

try {
    $result = $apiInstance->getWebDownloadCachedAvailabilityBatch($hash, $format, $listFiles, $checkCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->getWebDownloadCachedAvailabilityBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hash** | [**string[]**](../Model/string.md)|  | [optional] |
| **format** | **string**| Format you want the data in. Acceptable is either \&quot;object\&quot; or \&quot;list\&quot;. List is the most performant option as it doesn&#39;t require modification of the list. | [optional] [default to &#39;object&#39;] |
| **listFiles** | **bool**| Allows you to list the files found inside the cached data. | [optional] [default to false] |
| **checkCached** | [**\TorBox\Sdk\Model\CheckCached**](../Model/CheckCached.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetWebDownloadCachedAvailabilityBatchResponse**](../Model/GetWebDownloadCachedAvailabilityBatchResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebDownloadList()`

```php
getWebDownloadList($id, $bypassCache, $offset, $limit, $files, $active): \TorBox\Sdk\Model\GetWebDownloadListResponse
```

Get Web Download List

### Overview  Gets the user's web download list. This gives you the needed information to perform other usenet actions. Unlike Torrents, this information is updated on its own every 5 seconds for live web downloads.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Determines the torrent requested, will return an object rather than list. Optional.
$bypassCache = false; // bool | Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls.
$offset = 0; // int | Determines the offset of items to get from the database. Default is 0. Optional.
$limit = 1000; // int | Determines the number of items to recieve per request. Default is 1000. Optional.
$files = true; // bool | Exclude files from response. Optional
$active = True; // bool | Shows only active downloads. Optional

try {
    $result = $apiInstance->getWebDownloadList($id, $bypassCache, $offset, $limit, $files, $active);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->getWebDownloadList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Determines the torrent requested, will return an object rather than list. Optional. | [optional] |
| **bypassCache** | **bool**| Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls. | [optional] [default to false] |
| **offset** | **int**| Determines the offset of items to get from the database. Default is 0. Optional. | [optional] [default to 0] |
| **limit** | **int**| Determines the number of items to recieve per request. Default is 1000. Optional. | [optional] [default to 1000] |
| **files** | **bool**| Exclude files from response. Optional | [optional] [default to true] |
| **active** | **bool**| Shows only active downloads. Optional | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetWebDownloadListResponse**](../Model/GetWebDownloadListResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestWebDownloadLink()`

```php
requestWebDownloadLink($token, $webId, $fileId, $zipLink, $userIp, $redirect, $appendName): \TorBox\Sdk\Model\RequestWebDownloadLinkResponse
```

Request Download Link

### Overview  Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Permalinks  Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$webId = 56; // int | The web download's ID that you want to download
$fileId = 0; // int | The files's ID that you want to download
$zipLink = false; // bool | If you want a zip link. Required if no file_id. Takes precedence over file_id if both are given.
$userIp = 'userIp_example'; // string | The user's IP to determine the closest CDN. Optional.
$redirect = false; // bool | If you want to redirect the user to the CDN link. This is useful for creating permalinks so that you can just make this request URL the link.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.

try {
    $result = $apiInstance->requestWebDownloadLink($token, $webId, $fileId, $zipLink, $userIp, $redirect, $appendName);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->requestWebDownloadLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **webId** | **int**| The web download&#39;s ID that you want to download | |
| **fileId** | **int**| The files&#39;s ID that you want to download | [optional] [default to 0] |
| **zipLink** | **bool**| If you want a zip link. Required if no file_id. Takes precedence over file_id if both are given. | [optional] [default to false] |
| **userIp** | **string**| The user&#39;s IP to determine the closest CDN. Optional. | [optional] |
| **redirect** | **bool**| If you want to redirect the user to the CDN link. This is useful for creating permalinks so that you can just make this request URL the link. | [optional] [default to false] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\RequestWebDownloadLinkResponse**](../Model/RequestWebDownloadLinkResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestWebDownloadLinksGet()`

```php
requestWebDownloadLinksGet($token, $webId, $fileIds, $userIp, $appendName, $requestDownloadBatch): \TorBox\Sdk\Model\RequestWebDownloadLinksGetResponse
```

Request Download Links - GET

### Overview  Requests multiple download links from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$webId = 56; // int | The web download's ID that you want to download
$fileIds = array(56); // int[] | The files's ID that you want to download
$userIp = 'userIp_example'; // string | The user's IP to determine the closest CDN. Optional.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.
$requestDownloadBatch = new \TorBox\Sdk\Model\RequestDownloadBatch(); // \TorBox\Sdk\Model\RequestDownloadBatch

try {
    $result = $apiInstance->requestWebDownloadLinksGet($token, $webId, $fileIds, $userIp, $appendName, $requestDownloadBatch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->requestWebDownloadLinksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **webId** | **int**| The web download&#39;s ID that you want to download | |
| **fileIds** | [**int[]**](../Model/int.md)| The files&#39;s ID that you want to download | [optional] |
| **userIp** | **string**| The user&#39;s IP to determine the closest CDN. Optional. | [optional] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |
| **requestDownloadBatch** | [**\TorBox\Sdk\Model\RequestDownloadBatch**](../Model/RequestDownloadBatch.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\RequestWebDownloadLinksGetResponse**](../Model/RequestWebDownloadLinksGetResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestWebDownloadLinksPost()`

```php
requestWebDownloadLinksPost($token, $webId, $fileIds, $userIp, $appendName, $requestDownloadBatch): \TorBox\Sdk\Model\RequestWebDownloadLinksPostResponse
```

Request Download Links - POST

### Overview  Requests multiple download links from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\WebDownloadsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$webId = 56; // int | The web downloads' ID that you want to download
$fileIds = array(56); // int[]
$userIp = 'userIp_example'; // string | The user's IP to determine the closest CDN. Optional.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.
$requestDownloadBatch = {file_ids=[0, 1, 2]}; // \TorBox\Sdk\Model\RequestDownloadBatch

try {
    $result = $apiInstance->requestWebDownloadLinksPost($token, $webId, $fileIds, $userIp, $appendName, $requestDownloadBatch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebDownloadsApi->requestWebDownloadLinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **webId** | **int**| The web downloads&#39; ID that you want to download | |
| **fileIds** | [**int[]**](../Model/int.md)|  | [optional] |
| **userIp** | **string**| The user&#39;s IP to determine the closest CDN. Optional. | [optional] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |
| **requestDownloadBatch** | [**\TorBox\Sdk\Model\RequestDownloadBatch**](../Model/RequestDownloadBatch.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\RequestWebDownloadLinksPostResponse**](../Model/RequestWebDownloadLinksPostResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
