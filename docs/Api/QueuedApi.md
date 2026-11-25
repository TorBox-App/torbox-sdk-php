# TorBox\Sdk\QueuedApi

TorBox&#39;s queued service is like no other, and is a feature that no one else in this space has. TorBox is proud to allow the use of the queue system over the API, and these are the docs for how to do so!

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**controlQueuedDownloads()**](QueuedApi.md#controlQueuedDownloads) | **POST** /v1/api/queued/controlqueued | Control Queued Downloads |
| [**getQueuedDownloads()**](QueuedApi.md#getQueuedDownloads) | **GET** /v1/api/queued/getqueued | Get Queued Downloads |


## `controlQueuedDownloads()`

```php
controlQueuedDownloads($controlQueuedDownload): \TorBox\Sdk\Model\ControlQueuedDownloadsResponse
```

Control Queued Downloads

### Overview  Controls a queued torrent. By sending the queued torrent's ID and the type of operation you want to perform, it will perform that action on the queued torrent.  Operations are either:  - **Delete** `deletes the queued download from your account`  - **Start** `starts a queued download, cannot be used with the \"all\" parameter`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\QueuedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$controlQueuedDownload = {"queued_id":0,"operation":"delete","all":false}; // \TorBox\Sdk\Model\ControlQueuedDownload

try {
    $result = $apiInstance->controlQueuedDownloads($controlQueuedDownload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QueuedApi->controlQueuedDownloads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **controlQueuedDownload** | [**\TorBox\Sdk\Model\ControlQueuedDownload**](../Model/ControlQueuedDownload.md)|  | |

### Return type

[**\TorBox\Sdk\Model\ControlQueuedDownloadsResponse**](../Model/ControlQueuedDownloadsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getQueuedDownloads()`

```php
getQueuedDownloads($id, $type, $bypassCache, $offset, $limit): \TorBox\Sdk\Model\GetQueuedDownloadsResponse
```

Get Queued Downloads

### Overview  Retrieves all of a user's queued downloads by type. If you want to get all 3 types, \"torrent\", \"usenet\" and \"webdl\" then you will need to run this request 3 times, each with the different type.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\QueuedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Determines the queued download requested, will return an object rather than list. Optional.
$type = 'torrent'; // string | The type of the queued download you want to retrieve. Can be \"torrent\", \"usenet\" or \"webdl\". Optional. Default is \"torrent\".
$bypassCache = false; // bool | Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls.
$offset = 0; // int | Determines the offset of items to get from the database. Default is 0. Optional.
$limit = 1000; // int | Determines the number of items to recieve per request. Default is 1000. Optional.

try {
    $result = $apiInstance->getQueuedDownloads($id, $type, $bypassCache, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QueuedApi->getQueuedDownloads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Determines the queued download requested, will return an object rather than list. Optional. | [optional] |
| **type** | **string**| The type of the queued download you want to retrieve. Can be \&quot;torrent\&quot;, \&quot;usenet\&quot; or \&quot;webdl\&quot;. Optional. Default is \&quot;torrent\&quot;. | [optional] [default to &#39;torrent&#39;] |
| **bypassCache** | **bool**| Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls. | [optional] [default to false] |
| **offset** | **int**| Determines the offset of items to get from the database. Default is 0. Optional. | [optional] [default to 0] |
| **limit** | **int**| Determines the number of items to recieve per request. Default is 1000. Optional. | [optional] [default to 1000] |

### Return type

[**\TorBox\Sdk\Model\GetQueuedDownloadsResponse**](../Model/GetQueuedDownloadsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
