# TorBox\Sdk\AssistantApi

TorBox&#39;s AI assistant! Use this route to implement TorBox&#39;s AI assistant into your app. Give your users the power of a personal TorBox AI no matter what app they are using.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**chatWithAssistant()**](AssistantApi.md#chatWithAssistant) | **POST** /v1/api/assistant/chat | Chat With Assistant |
| [**deleteAssistantConversation()**](AssistantApi.md#deleteAssistantConversation) | **DELETE** /v1/api/assistant/conversations/{session_id} | Delete Assistant Conversation |
| [**deleteAssistantConversations()**](AssistantApi.md#deleteAssistantConversations) | **DELETE** /v1/api/assistant/conversations | Delete All Assistant Conversations |
| [**getAssistantUsage()**](AssistantApi.md#getAssistantUsage) | **GET** /v1/api/assistant/usage | Get Assistant Usage |
| [**listAssistantConversations()**](AssistantApi.md#listAssistantConversations) | **GET** /v1/api/assistant/conversations | Get Assistant Conversations |
| [**readAssistantConversation()**](AssistantApi.md#readAssistantConversation) | **GET** /v1/api/assistant/conversations/{session_id} | Get Assistant Conversation |


## `chatWithAssistant()`

```php
chatWithAssistant($chatRequest): string
```

Chat With Assistant

### Overview  Send a message to the AI Assistant. Optionally include a `session_id` to resume a previous conversation. If no `session_id` is given, the AI will have no previous context and will create a new conversation.  Also included is a way to upload `files` in base64 allowing you to attach a file that the AI Assistant can use.  We also allow you to send `blocks` which is a list of strings that state what additional features your chat interface includes. If no `blocks` are sent, responses are sent in plain text and markdown (for things like tables or bolding text).  The answer is streamed as plain text while it is written. Send the header `Accept: text/event-stream` to get it as server-sent events instead: `tool` with the `name` of each tool the assistant uses, `text` with each piece of the answer, `support` with the `id` of the support conversation when the chat is handed to the support team, `usage` with the share of the day's allowance that is `used` and when it `resets_at`, `error` with the error if the answer fails, and `done` at the end.  ``` event: tool data: {\"name\": \"get_torrent_list\"}  event: text data: {\"text\": \"You have 2 torrents, \"}  event: text data: {\"text\": \"and both have finished downloading.\"}  event: usage data: {\"used\": 0.0123, \"resets_at\": \"2026-01-01T00:00:00Z\"}  event: done data: {} ```  The `X-Session-ID` response header holds the `session_id` to send with the next message.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$chatRequest = {"message":"string","session_id":"string","files":[{"name":"string","data":"string"}],"blocks":["string"]}; // \TorBox\Sdk\Model\ChatRequest

try {
    $result = $apiInstance->chatWithAssistant($chatRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->chatWithAssistant: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **chatRequest** | [**\TorBox\Sdk\Model\ChatRequest**](../Model/ChatRequest.md)|  | |

### Return type

**string**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/plain`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAssistantConversation()`

```php
deleteAssistantConversation($sessionId): \TorBox\Sdk\Model\DeleteAssistantConversationResponse
```

Delete Assistant Conversation

### Overview  Deletes a specific conversation with the AI assistant. Usage persists from the conversation.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sessionId = 'sessionId_example'; // string | The session you want to retrieve.

try {
    $result = $apiInstance->deleteAssistantConversation($sessionId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->deleteAssistantConversation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sessionId** | **string**| The session you want to retrieve. | |

### Return type

[**\TorBox\Sdk\Model\DeleteAssistantConversationResponse**](../Model/DeleteAssistantConversationResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAssistantConversations()`

```php
deleteAssistantConversations(): \TorBox\Sdk\Model\DeleteAssistantConversationsResponse
```

Delete All Assistant Conversations

### Overview  Deletes all conversations for a user's account. Usage persists from the conversations.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->deleteAssistantConversations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->deleteAssistantConversations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\DeleteAssistantConversationsResponse**](../Model/DeleteAssistantConversationsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAssistantUsage()`

```php
getAssistantUsage(): \TorBox\Sdk\Model\GetAssistantUsageResponse
```

Get Assistant Usage

### Overview  Gets the current user's AI assistant usage. Users are limited to a certain number of tokens daily, and this endpoint tells you exactly how much is left as a percentage. This makes it easy for developers so they don't have to spend time counting tokens, which is usually inaccurate.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAssistantUsage();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->getAssistantUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetAssistantUsageResponse**](../Model/GetAssistantUsageResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAssistantConversations()`

```php
listAssistantConversations(): \TorBox\Sdk\Model\ListAssistantConversationsResponse
```

Get Assistant Conversations

### Overview  Gets the user's open conversations. Conversations are sorted newest first. Each conversation is kept for 30 days after its last message.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAssistantConversations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->listAssistantConversations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\ListAssistantConversationsResponse**](../Model/ListAssistantConversationsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `readAssistantConversation()`

```php
readAssistantConversation($sessionId, $since): \TorBox\Sdk\Model\ReadAssistantConversationResponse
```

Get Assistant Conversation

### Overview  Get a specific user conversation with the AI assistant.  You can pass the `since` parameter with a Unix timestamp, and will show any revisions since that time, this way, you don't waste bandwidth retrieving and updating the entire conversation. If no update has been made since, the data return will be null.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\AssistantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sessionId = 'sessionId_example'; // string | The session you want to retrieve.
$since = 56; // int | Unix timestamp of the conversation you want to get since this time.

try {
    $result = $apiInstance->readAssistantConversation($sessionId, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssistantApi->readAssistantConversation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sessionId** | **string**| The session you want to retrieve. | |
| **since** | **int**| Unix timestamp of the conversation you want to get since this time. | [optional] |

### Return type

[**\TorBox\Sdk\Model\ReadAssistantConversationResponse**](../Model/ReadAssistantConversationResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
