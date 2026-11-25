# TorBox\Sdk\TagsApi

Here you can manage tags, get user tags, and manage the tags attached to a user&#39;s account. This is compared to the previous which was very tedious, and made the adoption of tags slow. With this new route, tags are much easier to use and manage.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**controlTag()**](TagsApi.md#controlTag) | **POST** /v1/api/tags/controltag | Control Tag |
| [**editTag()**](TagsApi.md#editTag) | **PUT** /v1/api/tags/edittag | Edit Tag |
| [**getTags()**](TagsApi.md#getTags) | **GET** /v1/api/tags/mytags | Get User Tags |


## `controlTag()`

```php
controlTag($controlTag): \TorBox\Sdk\Model\ControlTagResponse
```

Control Tag

### Overview  Controls a tag. Currently, the only operation is \"delete\", which deletes the tag and removes it from every download using it; the downloads stay in your account and are otherwise unmodified. The ID is the tag's ID from `/mytags` endpoint.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\TagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$controlTag = {"id":0,"operation":"delete"}; // \TorBox\Sdk\Model\ControlTag

try {
    $result = $apiInstance->controlTag($controlTag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->controlTag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **controlTag** | [**\TorBox\Sdk\Model\ControlTag**](../Model/ControlTag.md)|  | |

### Return type

[**\TorBox\Sdk\Model\ControlTagResponse**](../Model/ControlTagResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editTag()`

```php
editTag($editTag): \TorBox\Sdk\Model\EditTagResponse
```

Edit Tag

### Overview  Renames a tag. This new name is case sensitive. The ID is the tag's ID from the `/mytags`. Fails with `DUPLICATE_ITEM` when another of the user's tags already has the same name, in any casing.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\TagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$editTag = {"id":0,"new_name":"string"}; // \TorBox\Sdk\Model\EditTag

try {
    $result = $apiInstance->editTag($editTag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->editTag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **editTag** | [**\TorBox\Sdk\Model\EditTag**](../Model/EditTag.md)|  | |

### Return type

[**\TorBox\Sdk\Model\EditTagResponse**](../Model/EditTagResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTags()`

```php
getTags(): \TorBox\Sdk\Model\GetTagsResponse
```

Get User Tags

### Overview  Gets the tags attached to a user account, with the downloads using each tag, their count and total size.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\TagsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getTags();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->getTags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetTagsResponse**](../Model/GetTagsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
