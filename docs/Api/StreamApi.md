# TorBox\Sdk\StreamApi

With the release of TorBox v8.1 we are introducing the ability to stream any video file directly in your browser, and this is fully powered by our API, which is available for developers to integrate into their apps. With minimal wait times for stream starts, low bandwidth streaming, and integrated subtitles and audio choosing, this API makes it simple to create a web player based off of a user&#39;s TorBox video files.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createStream()**](StreamApi.md#createStream) | **GET** /v1/api/stream/createstream | Create Stream |
| [**getStreamData()**](StreamApi.md#getStreamData) | **GET** /v1/api/stream/getstreamdata | Get Stream Data |


## `createStream()`

```php
createStream($id, $fileId, $type, $chosenSubtitleIndex, $chosenAudioIndex, $chosenResolutionIndex, $scrobblingEnabled): \TorBox\Sdk\Model\CreateStreamResponse
```

Create Stream

### Overview  Creates a new stream based off of the data provided.  #### Selecting Subtitles and Audios  We use indexes to determine which audio and subtitle you would like to select. To view all available indexes, you must request this endpoint intially with \"null\" or 0, for the chosen indexes. This will return a metadata dictionary in the response, which will contain the list of audios and subtitles available for this stream. When choosing a subtitle or audio stream, use the **relative index**, starting from 0, rather than the \"index\" value. This is important for selecting the correct index. Once your user gets a selection of audios and subtitles available, you can submit this to the endpoint again to get the chosen stream.  - **null** - Selecting no subtitle. Not available for audio as one must always be selected.  - **0** - Selecting first subtitle or audio   #### Selecting Resolution  Similar to the subtitles and audios, we use indexes to determine the resolution chosen. Unlike the above, these are predetermined. We do not upscale video, so if for example, you pass a 1080p video, and request it with resolution, 7, it will stay at 1080p. Please see the below for options.  - **null** - Original video resolution. No downscaling will take place.  - **0** - 144p  - **1** - 240p  - **2** - 360p  - **3** - 480p  - **4** - 720p  - **5** - 1080p  - **6** - 1440p  - **7** - 2160p   #### Types  This endpoint allows you to handle torrents, usenet and web downloads all in one. This is why the \"type\" parameter is available. It defaults to \"torrent\".  - **torrent** - Torrents  - **usenet** - Usenet downloads  - **webdownload** - Web Downloads   #### Important Notes  - Only text based subtitles are supported. If a non-text based subtitle is selected, it will be ignored.  - If a subtitle or audio index does not exist on the stream, it will be ignored.  - There are a lot of edge-case videos, if something doesn't work, don't hesitate to report the download hash and file_id of the failing video file.  - This is a **Pro** only feature.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\StreamApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The ID of the type of download.
$fileId = 0; // int | The file ID inside of the download you would like to stream.
$type = 'torrent'; // string | The type of download that this is. If choosing the incorrect one, the ID will be incorrect.
$chosenSubtitleIndex = 'chosenSubtitleIndex_example'; // string | The relative index of the subtitle you would like to stream. This is default null for none. 0 is the first subtitle found.
$chosenAudioIndex = 0; // int | The relative index of the subtitle you would like to stream. Defaults to 0 for the first audio stream found inside the file. Cannot be null.
$chosenResolutionIndex = 'chosenResolutionIndex_example'; // string | The index of the resolution you would like to stream. This is default null for original.
$scrobblingEnabled = true; // bool

try {
    $result = $apiInstance->createStream($id, $fileId, $type, $chosenSubtitleIndex, $chosenAudioIndex, $chosenResolutionIndex, $scrobblingEnabled);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StreamApi->createStream: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The ID of the type of download. | |
| **fileId** | **int**| The file ID inside of the download you would like to stream. | [optional] [default to 0] |
| **type** | **string**| The type of download that this is. If choosing the incorrect one, the ID will be incorrect. | [optional] [default to &#39;torrent&#39;] |
| **chosenSubtitleIndex** | **string**| The relative index of the subtitle you would like to stream. This is default null for none. 0 is the first subtitle found. | [optional] |
| **chosenAudioIndex** | **int**| The relative index of the subtitle you would like to stream. Defaults to 0 for the first audio stream found inside the file. Cannot be null. | [optional] [default to 0] |
| **chosenResolutionIndex** | **string**| The index of the resolution you would like to stream. This is default null for original. | [optional] |
| **scrobblingEnabled** | **bool**|  | [optional] [default to true] |

### Return type

[**\TorBox\Sdk\Model\CreateStreamResponse**](../Model/CreateStreamResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStreamData()`

```php
getStreamData($token, $presignedToken, $chosenSubtitleIndex, $chosenAudioIndex, $chosenResolutionIndex): \TorBox\Sdk\Model\GetStreamDataResponse
```

Get Stream Data

### Overview  Gets stream data from an already created stream. Requires the presigned token and user API token from the original request.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\StreamApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = 'token_example'; // string | The user's API token, can also be used from the original, /createstream request.
$presignedToken = 'presignedToken_example'; // string | The presigned token given from the original, /createstream request.
$chosenSubtitleIndex = 'chosenSubtitleIndex_example'; // string | The chosen subtitle index that you are requesting information about.
$chosenAudioIndex = 0; // int | The chosen audio index that you are requesting information about.
$chosenResolutionIndex = 'chosenResolutionIndex_example'; // string | The index of the resolution you would like to stream. This is default null for original.

try {
    $result = $apiInstance->getStreamData($token, $presignedToken, $chosenSubtitleIndex, $chosenAudioIndex, $chosenResolutionIndex);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StreamApi->getStreamData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **token** | **string**| The user&#39;s API token, can also be used from the original, /createstream request. | |
| **presignedToken** | **string**| The presigned token given from the original, /createstream request. | |
| **chosenSubtitleIndex** | **string**| The chosen subtitle index that you are requesting information about. | [optional] |
| **chosenAudioIndex** | **int**| The chosen audio index that you are requesting information about. | [optional] [default to 0] |
| **chosenResolutionIndex** | **string**| The index of the resolution you would like to stream. This is default null for original. | [optional] |

### Return type

[**\TorBox\Sdk\Model\GetStreamDataResponse**](../Model/GetStreamDataResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
