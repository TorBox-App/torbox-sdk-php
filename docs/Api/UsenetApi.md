# TorBox\Sdk\UsenetApi

Usenet is a newer feature of TorBox, which allows you to access the Usenet simply using TorBox and our easy to use API. Results will look exactly the same as torrents, which is why there are less examples here.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**asyncCreateUsenetDownload()**](UsenetApi.md#asyncCreateUsenetDownload) | **POST** /v1/api/usenet/asynccreateusenetdownload | Async Create Usenet Download |
| [**controlUsenetDownload()**](UsenetApi.md#controlUsenetDownload) | **POST** /v1/api/usenet/controlusenetdownload | Control Usenet Download |
| [**createUsenetDownload()**](UsenetApi.md#createUsenetDownload) | **POST** /v1/api/usenet/createusenetdownload | Create Usenet Download |
| [**editUsenetItem()**](UsenetApi.md#editUsenetItem) | **PUT** /v1/api/usenet/editusenetdownload | Edit Usenet Item |
| [**getNewsServerAccount()**](UsenetApi.md#getNewsServerAccount) | **GET** /v1/api/usenet/provider/account | Get News Server Account |
| [**getNewsServerConnectionInformation()**](UsenetApi.md#getNewsServerConnectionInformation) | **GET** /v1/api/usenet/provider/connection | Get News Server Connection Information |
| [**getUsenetCachedAvailability()**](UsenetApi.md#getUsenetCachedAvailability) | **GET** /v1/api/usenet/checkcached | Get Usenet Cached Availability |
| [**getUsenetCachedAvailabilityBatch()**](UsenetApi.md#getUsenetCachedAvailabilityBatch) | **POST** /v1/api/usenet/checkcached | Get Usenet Cached Availability Batch |
| [**getUsenetList()**](UsenetApi.md#getUsenetList) | **GET** /v1/api/usenet/mylist | Get Usenet List |
| [**requestUsenetDownloadLink()**](UsenetApi.md#requestUsenetDownloadLink) | **GET** /v1/api/usenet/requestdl | Request Download Link |
| [**requestUsenetDownloadLinksGet()**](UsenetApi.md#requestUsenetDownloadLinksGet) | **GET** /v1/api/usenet/requestdl/batch | Request Download Links - GET |
| [**requestUsenetDownloadLinksPost()**](UsenetApi.md#requestUsenetDownloadLinksPost) | **POST** /v1/api/usenet/requestdl/batch | Request Download Links - POST |
| [**resetNewsServerAccountPassword()**](UsenetApi.md#resetNewsServerAccountPassword) | **POST** /v1/api/usenet/provider/account/resetpw | Reset News Server Account Password |


## `asyncCreateUsenetDownload()`

```php
asyncCreateUsenetDownload($link, $file, $name, $password, $postProcessing, $asQueued, $addOnlyIfCached): \TorBox\Sdk\Model\AsyncCreateUsenetDownloadResponse
```

Async Create Usenet Download

### Overview  Creates a usenet download asynchronously under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large.  The request will return instantly, not returning any data other than a success message. This is the same for failures, as they will return the error in the background as a notification, rather than immediately.  The post processing options are the same as for the Create Usenet Download endpoint.  ### Rate Limits  This endpoint is rate limited to **60 requests per hour** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$link = 'link_example'; // string | An accessible link to an NZB file. Cannot be a redirection. Optional.
$file = '/path/to/file.txt'; // \SplFileObject | An NZB File. Optional.
$name = 'name_example'; // string | The name you want the usenet download to be. Optional.
$password = 'password_example'; // string | The password to send to the Usenet client. This is used for extracting the RAR at the end. Optional.
$postProcessing = -1; // int | The post processing option to use. Read the overview of the Create Usenet Download endpoint for the options. Default is -1. Optional.
$asQueued = false; // bool | Tells TorBox you want this usenet download instantly queued. Optional.
$addOnlyIfCached = false; // bool | Only adds the download if it is cached on TorBox. If not cached, it won't be added.

try {
    $result = $apiInstance->asyncCreateUsenetDownload($link, $file, $name, $password, $postProcessing, $asQueued, $addOnlyIfCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->asyncCreateUsenetDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **link** | **string**| An accessible link to an NZB file. Cannot be a redirection. Optional. | [optional] |
| **file** | **\SplFileObject****\SplFileObject**| An NZB File. Optional. | [optional] |
| **name** | **string**| The name you want the usenet download to be. Optional. | [optional] |
| **password** | **string**| The password to send to the Usenet client. This is used for extracting the RAR at the end. Optional. | [optional] |
| **postProcessing** | **int**| The post processing option to use. Read the overview of the Create Usenet Download endpoint for the options. Default is -1. Optional. | [optional] [default to -1] |
| **asQueued** | **bool**| Tells TorBox you want this usenet download instantly queued. Optional. | [optional] [default to false] |
| **addOnlyIfCached** | **bool**| Only adds the download if it is cached on TorBox. If not cached, it won&#39;t be added. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\AsyncCreateUsenetDownloadResponse**](../Model/AsyncCreateUsenetDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `controlUsenetDownload()`

```php
controlUsenetDownload($controlUsenetDownload): \TorBox\Sdk\Model\ControlUsenetDownloadResponse
```

Control Usenet Download

### Overview  Controls a usenet download. By sending the usenet download's ID and the type of operation you want to perform, it will send that request to the usenet client.  Operations are either:  - **Delete** `deletes the nzb from the client and your account permanently`   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$controlUsenetDownload = {"usenet_id":1,"operation":"delete","all":false}; // \TorBox\Sdk\Model\ControlUsenetDownload

try {
    $result = $apiInstance->controlUsenetDownload($controlUsenetDownload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->controlUsenetDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **controlUsenetDownload** | [**\TorBox\Sdk\Model\ControlUsenetDownload**](../Model/ControlUsenetDownload.md)|  | |

### Return type

[**\TorBox\Sdk\Model\ControlUsenetDownloadResponse**](../Model/ControlUsenetDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createUsenetDownload()`

```php
createUsenetDownload($link, $file, $name, $password, $postProcessing, $asQueued, $addOnlyIfCached): \TorBox\Sdk\Model\CreateUsenetDownloadResponse
```

Create Usenet Download

### Overview  Creates a usenet download under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large.  #### Post Processing Options:  All post processing options that the Usenet client will perform before TorBox's own processing to make the files available. It is recommended you either don't send this parameter, or keep it at `-1` for default, which will give only the wanted files.  - `-1`, Default. This runs repairs, and extractions as well as deletes the source files leaving only the wanted downloaded files.  - `0`, None. No post-processing at all. Just download all the files (including all PAR2). TorBox will still do its normal processing to make the download available, but no repairs, or extraction will take place.  - `1`, Repair. Download files and do a PAR2 verification. If the verification fails, download more PAR2 files and attempt to repair the files.  - `2`, Repair and Unpack. Download all files, do a PAR2 verification and unpack the files. The final folder will also include the RAR and ZIP files.  - `3`, Repair, Unpack and Delete. Download all files, do a PAR2 verification, unpack the files to the final folder and delete the source files.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$link = 'link_example'; // string | An accessible link to an NZB file. Cannot be a redirection. Optional.
$file = '/path/to/file.txt'; // \SplFileObject | An NZB File. Optional.
$name = 'name_example'; // string | The name you want the usenet download to be. Optional.
$password = 'password_example'; // string | The password to send to the Usenet client. This is used for extracting the RAR at the end. Optional.
$postProcessing = -1; // int | The post processing option to use. Read the overview for the options. Default is -1. Optional.
$asQueued = false; // bool | Tells TorBox you want this usenet download.instantly queued. Optional.
$addOnlyIfCached = false; // bool | Only adds the download if it is cached on TorBox. If not cached, it won't be added.

try {
    $result = $apiInstance->createUsenetDownload($link, $file, $name, $password, $postProcessing, $asQueued, $addOnlyIfCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->createUsenetDownload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **link** | **string**| An accessible link to an NZB file. Cannot be a redirection. Optional. | [optional] |
| **file** | **\SplFileObject****\SplFileObject**| An NZB File. Optional. | [optional] |
| **name** | **string**| The name you want the usenet download to be. Optional. | [optional] |
| **password** | **string**| The password to send to the Usenet client. This is used for extracting the RAR at the end. Optional. | [optional] |
| **postProcessing** | **int**| The post processing option to use. Read the overview for the options. Default is -1. Optional. | [optional] [default to -1] |
| **asQueued** | **bool**| Tells TorBox you want this usenet download.instantly queued. Optional. | [optional] [default to false] |
| **addOnlyIfCached** | **bool**| Only adds the download if it is cached on TorBox. If not cached, it won&#39;t be added. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\CreateUsenetDownloadResponse**](../Model/CreateUsenetDownloadResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editUsenetItem()`

```php
editUsenetItem($editUsenetDownload): \TorBox\Sdk\Model\EditUsenetItemResponse
```

Edit Usenet Item

### Overview  Updates a download item based on the item's ID. Sending a PUT request with valid items overwrites the previous items entirely, so use this endpoint with caution. Please make sure to read the restrictions below as they are important.  ### Restrictions  - Does not affect the cached database (or any other user's item).  - Name must pass validation:      - Above 1 character long.      - Below 200 characters long.      - Cannot contain any non-url or non filesystem safe characters. (This is removed automatically).      - Cannot contain any leading or trailing whitespace. You can have spaces in the middle. (This is removed automatically).  - Tags follow the same rules as the name.  - Alternative hashes must be of MD5, SHA1, or SHA256.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$editUsenetDownload = {"usenet_download_id":0,"name":"string","tags":["string"],"alternative_hashes":["0123456789abcdef0123456789abcdef01234567"],"airlocked":false}; // \TorBox\Sdk\Model\EditUsenetDownload

try {
    $result = $apiInstance->editUsenetItem($editUsenetDownload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->editUsenetItem: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **editUsenetDownload** | [**\TorBox\Sdk\Model\EditUsenetDownload**](../Model/EditUsenetDownload.md)|  | |

### Return type

[**\TorBox\Sdk\Model\EditUsenetItemResponse**](../Model/EditUsenetItemResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNewsServerAccount()`

```php
getNewsServerAccount(): \TorBox\Sdk\Model\GetNewsServerAccountResponse
```

Get News Server Account

### Overview  Gets the user's TorBox News Server Account with authentication details. Does not show password if not creating the account. Account creation happens on the first request. If you need to get the password, or reset the password, use the `/usenet/provider/account/resetpw` `POST` endpoint.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getNewsServerAccount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->getNewsServerAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetNewsServerAccountResponse**](../Model/GetNewsServerAccountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNewsServerConnectionInformation()`

```php
getNewsServerConnectionInformation(): \TorBox\Sdk\Model\GetNewsServerConnectionInformationResponse
```

Get News Server Connection Information

### Overview  Gets the TorBox News Server Connection information. This is a static path, and is not dynamic.  ### Authorization  No authentication required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getNewsServerConnectionInformation();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->getNewsServerConnectionInformation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetNewsServerConnectionInformationResponse**](../Model/GetNewsServerConnectionInformationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsenetCachedAvailability()`

```php
getUsenetCachedAvailability($hash, $format, $listFiles, $checkCached): \TorBox\Sdk\Model\GetUsenetCachedAvailabilityResponse
```

Get Usenet Cached Availability

### Overview  Takes in a list of comma separated usenet hashes and checks if the usenet download is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as: `?hash=XXXX&hash=XXXX&hash=XXXX`  or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX` and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.  You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.  To get the hash of a usenet download, you can read [this document](https://support.torbox.app/en/articles/13681109-technical-getting-hashes-for-searches) for all of the strategies.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hash = array('hash_example'); // string[] | The list of usenet hashes you want to check. Comma seperated. To find the hash, md5 the link of the usenet link or file.
$format = 'object'; // string | Format you want the data in. Acceptable is either \"object\" or \"list\". List is the most performant option as it doesn't require modification of the list.
$listFiles = false; // bool | Allows you to list the files found inside the cached data. Optional.
$checkCached = new \TorBox\Sdk\Model\CheckCached(); // \TorBox\Sdk\Model\CheckCached

try {
    $result = $apiInstance->getUsenetCachedAvailability($hash, $format, $listFiles, $checkCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->getUsenetCachedAvailability: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hash** | [**string[]**](../Model/string.md)| The list of usenet hashes you want to check. Comma seperated. To find the hash, md5 the link of the usenet link or file. | [optional] |
| **format** | **string**| Format you want the data in. Acceptable is either \&quot;object\&quot; or \&quot;list\&quot;. List is the most performant option as it doesn&#39;t require modification of the list. | [optional] [default to &#39;object&#39;] |
| **listFiles** | **bool**| Allows you to list the files found inside the cached data. Optional. | [optional] [default to false] |
| **checkCached** | [**\TorBox\Sdk\Model\CheckCached**](../Model/CheckCached.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetUsenetCachedAvailabilityResponse**](../Model/GetUsenetCachedAvailabilityResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsenetCachedAvailabilityBatch()`

```php
getUsenetCachedAvailabilityBatch($hash, $format, $listFiles, $checkCached): \TorBox\Sdk\Model\GetUsenetCachedAvailabilityBatchResponse
```

Get Usenet Cached Availability Batch

### Overview  Takes in a list of comma separated hashes and checks if the torrent is cached. With the POST endpoint you can submit a nearly unlimited hashes compared to the GET endpoint which is limited by url parameters.  Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.  You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hash = array('hash_example'); // string[]
$format = 'object'; // string
$listFiles = false; // bool
$checkCached = {hashes=[string]}; // \TorBox\Sdk\Model\CheckCached

try {
    $result = $apiInstance->getUsenetCachedAvailabilityBatch($hash, $format, $listFiles, $checkCached);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->getUsenetCachedAvailabilityBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hash** | [**string[]**](../Model/string.md)|  | [optional] |
| **format** | **string**|  | [optional] [default to &#39;object&#39;] |
| **listFiles** | **bool**|  | [optional] [default to false] |
| **checkCached** | [**\TorBox\Sdk\Model\CheckCached**](../Model/CheckCached.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetUsenetCachedAvailabilityBatchResponse**](../Model/GetUsenetCachedAvailabilityBatchResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUsenetList()`

```php
getUsenetList($id, $bypassCache, $offset, $limit, $files, $active): \TorBox\Sdk\Model\GetUsenetListResponse
```

Get Usenet List

### Overview  Gets the user's usenet download list. This gives you the needed information to perform other usenet actions. Unlike Torrents, this information is updated on its own every 5 seconds for live usenet downloads.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Determines the usenet download requested, will return an object rather than list. Optional.
$bypassCache = false; // bool | Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls.
$offset = 0; // int | Determines the offset of items to get from the database. Default is 0. Optional.
$limit = 1000; // int | Determines the number of items to recieve per request. Default is 1000. Optional.
$files = true; // bool | Exclude files from response. Optional
$active = True; // bool | Shows only active downloads. Optional

try {
    $result = $apiInstance->getUsenetList($id, $bypassCache, $offset, $limit, $files, $active);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->getUsenetList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Determines the usenet download requested, will return an object rather than list. Optional. | [optional] |
| **bypassCache** | **bool**| Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls. | [optional] [default to false] |
| **offset** | **int**| Determines the offset of items to get from the database. Default is 0. Optional. | [optional] [default to 0] |
| **limit** | **int**| Determines the number of items to recieve per request. Default is 1000. Optional. | [optional] [default to 1000] |
| **files** | **bool**| Exclude files from response. Optional | [optional] [default to true] |
| **active** | **bool**| Shows only active downloads. Optional | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetUsenetListResponse**](../Model/GetUsenetListResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestUsenetDownloadLink()`

```php
requestUsenetDownloadLink($token, $usenetId, $fileId, $zipLink, $userIp, $redirect, $appendName): \TorBox\Sdk\Model\RequestUsenetDownloadLinkResponse
```

Request Download Link

### Overview  Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Permalinks  Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$usenetId = 56; // int | The usenet download's ID that you want to download
$fileId = 0; // int | The files's ID that you want to download. Optional if using \"zip_link\".
$zipLink = false; // bool | If you want a zip link. Required if no file_id. Takes precedence over file_id if both are given.
$userIp = 'userIp_example'; // string | The user's IPv4 to determine the closest CDN. Optional.
$redirect = false; // bool | If you want to redirect the user to the CDN link. This is useful for creating permalinks so that you can just make this request URL the link.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.

try {
    $result = $apiInstance->requestUsenetDownloadLink($token, $usenetId, $fileId, $zipLink, $userIp, $redirect, $appendName);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->requestUsenetDownloadLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **usenetId** | **int**| The usenet download&#39;s ID that you want to download | |
| **fileId** | **int**| The files&#39;s ID that you want to download. Optional if using \&quot;zip_link\&quot;. | [optional] [default to 0] |
| **zipLink** | **bool**| If you want a zip link. Required if no file_id. Takes precedence over file_id if both are given. | [optional] [default to false] |
| **userIp** | **string**| The user&#39;s IPv4 to determine the closest CDN. Optional. | [optional] |
| **redirect** | **bool**| If you want to redirect the user to the CDN link. This is useful for creating permalinks so that you can just make this request URL the link. | [optional] [default to false] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\RequestUsenetDownloadLinkResponse**](../Model/RequestUsenetDownloadLinkResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestUsenetDownloadLinksGet()`

```php
requestUsenetDownloadLinksGet($token, $usenetId, $fileIds, $userIp, $appendName, $requestDownloadBatch): \TorBox\Sdk\Model\RequestUsenetDownloadLinksGetResponse
```

Request Download Links - GET

### Overview  Requests multiple download links from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$usenetId = 56; // int | The usenet download's ID that you want to download
$fileIds = array(56); // int[] | The files's ID that you want to download
$userIp = 'userIp_example'; // string | The user's IP to determine the closest CDN. Optional.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.
$requestDownloadBatch = new \TorBox\Sdk\Model\RequestDownloadBatch(); // \TorBox\Sdk\Model\RequestDownloadBatch

try {
    $result = $apiInstance->requestUsenetDownloadLinksGet($token, $usenetId, $fileIds, $userIp, $appendName, $requestDownloadBatch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->requestUsenetDownloadLinksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **usenetId** | **int**| The usenet download&#39;s ID that you want to download | |
| **fileIds** | [**int[]**](../Model/int.md)| The files&#39;s ID that you want to download | [optional] |
| **userIp** | **string**| The user&#39;s IP to determine the closest CDN. Optional. | [optional] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |
| **requestDownloadBatch** | [**\TorBox\Sdk\Model\RequestDownloadBatch**](../Model/RequestDownloadBatch.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\RequestUsenetDownloadLinksGetResponse**](../Model/RequestUsenetDownloadLinksGetResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestUsenetDownloadLinksPost()`

```php
requestUsenetDownloadLinksPost($token, $usenetId, $fileIds, $userIp, $appendName, $requestDownloadBatch): \TorBox\Sdk\Model\RequestUsenetDownloadLinksPostResponse
```

Request Download Links - POST

### Overview  Requests multiple download links from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.  ### Authorization  Requires an API key as a parameter for the `token` parameter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | Your API Key
$usenetId = 56; // int | The usenet downloads' ID that you want to download
$fileIds = array(56); // int[]
$userIp = 'userIp_example'; // string | The user's IP to determine the closest CDN. Optional.
$appendName = false; // bool | If you want to add the \"filename\" parameter to the returned CDN link. Optional. Default false.
$requestDownloadBatch = {file_ids=[0, 1, 2]}; // \TorBox\Sdk\Model\RequestDownloadBatch

try {
    $result = $apiInstance->requestUsenetDownloadLinksPost($token, $usenetId, $fileIds, $userIp, $appendName, $requestDownloadBatch);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->requestUsenetDownloadLinksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| Your API Key | |
| **usenetId** | **int**| The usenet downloads&#39; ID that you want to download | |
| **fileIds** | [**int[]**](../Model/int.md)|  | [optional] |
| **userIp** | **string**| The user&#39;s IP to determine the closest CDN. Optional. | [optional] |
| **appendName** | **bool**| If you want to add the \&quot;filename\&quot; parameter to the returned CDN link. Optional. Default false. | [optional] [default to false] |
| **requestDownloadBatch** | [**\TorBox\Sdk\Model\RequestDownloadBatch**](../Model/RequestDownloadBatch.md)|  | [optional] |

### Return type

[**\TorBox\Sdk\Model\RequestUsenetDownloadLinksPostResponse**](../Model/RequestUsenetDownloadLinksPostResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `resetNewsServerAccountPassword()`

```php
resetNewsServerAccountPassword(): \TorBox\Sdk\Model\ResetNewsServerAccountPasswordResponse
```

Reset News Server Account Password

### Overview  Resets the user's TorBox News Server account password. This password is automatically generated, and is not saved, it is only shown once.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UsenetApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->resetNewsServerAccountPassword();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsenetApi->resetNewsServerAccountPassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\ResetNewsServerAccountPasswordResponse**](../Model/ResetNewsServerAccountPasswordResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
