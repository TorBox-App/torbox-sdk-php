# TorBox\Sdk\UserApi

This is the way to identify TorBox user&#39;s as well as get information about the user you are working with. This data contains important endpoints that allow you to control and view data on the account.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addReferralToAccount()**](UserApi.md#addReferralToAccount) | **POST** /v1/api/user/addreferral | Add Referral To Account |
| [**deleteAccount()**](UserApi.md#deleteAccount) | **DELETE** /v1/api/user/deleteme | Delete Account |
| [**editUserSettings()**](UserApi.md#editUserSettings) | **PUT** /v1/api/user/settings/editsettings | Edit User Settings |
| [**getConfirmationCode()**](UserApi.md#getConfirmationCode) | **GET** /v1/api/user/getconfirmation | Get Confirmation Code |
| [**getReferralData()**](UserApi.md#getReferralData) | **GET** /v1/api/user/referraldata | Get Referral Data |
| [**getSubscriptions()**](UserApi.md#getSubscriptions) | **GET** /v1/api/user/subscriptions | Get Subscriptions |
| [**getTokenFromDeviceCodeProcess()**](UserApi.md#getTokenFromDeviceCodeProcess) | **POST** /v1/api/user/auth/device/token | Get Token From Device Code Process |
| [**getTransactionPdf()**](UserApi.md#getTransactionPdf) | **GET** /v1/api/user/transaction/pdf | Get Transaction PDF |
| [**getTransactions()**](UserApi.md#getTransactions) | **GET** /v1/api/user/transactions | Get Transactions |
| [**getUserData()**](UserApi.md#getUserData) | **GET** /v1/api/user/me | Get User Data |
| [**getUserStats()**](UserApi.md#getUserStats) | **GET** /v1/api/user/stats | Get User Stats |
| [**refreshApiToken()**](UserApi.md#refreshApiToken) | **POST** /v1/api/user/refreshtoken | Refresh API Token |
| [**startDeviceCodeAuthorizationProcess()**](UserApi.md#startDeviceCodeAuthorizationProcess) | **GET** /v1/api/user/auth/device/start | Start Device Code Authorization Process |


## `addReferralToAccount()`

```php
addReferralToAccount($referral): \TorBox\Sdk\Model\AddReferralToAccountResponse
```

Add Referral To Account

### Overview  Automatically adds a referral code to the user's account. This can be used for developers to automatically add their referral to user's accounts who use their service.  This will not override any referral a user already has. If they already have one, then it cannot be changed using this endpoint. It can only be done by the user on the [website](https://torbox.app/subscription).  ### Authorization  Requires an API key using the Authorization Bearer Header. Use the user's API key, not your own.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$referral = 'referral_example'; // string | A referral code. Must be UUID.

try {
    $result = $apiInstance->addReferralToAccount($referral);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->addReferralToAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **referral** | **string**| A referral code. Must be UUID. | |

### Return type

[**\TorBox\Sdk\Model\AddReferralToAccountResponse**](../Model/AddReferralToAccountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAccount()`

```php
deleteAccount($deleteAccountSchema): \TorBox\Sdk\Model\DeleteAccountResponse
```

Delete Account

### Overview  Permanently deletes the user's TorBox account. This cannot be undone.  Because of how dangerous this action is, it needs two things on top of the API key: the user's session token from the website, and a confirmation code, which is sent to the user's email by the Get Confirmation Code endpoint.  ### Authorization  Requires an API key using the Authorization Bearer Header, as well as the session token and the confirmation code in the body.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deleteAccountSchema = {"session_token":"string","confirmation_code":123456}; // \TorBox\Sdk\Model\DeleteAccountSchema

try {
    $result = $apiInstance->deleteAccount($deleteAccountSchema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->deleteAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deleteAccountSchema** | [**\TorBox\Sdk\Model\DeleteAccountSchema**](../Model/DeleteAccountSchema.md)|  | |

### Return type

[**\TorBox\Sdk\Model\DeleteAccountResponse**](../Model/DeleteAccountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editUserSettings()`

```php
editUserSettings($baseSettingsModel): \TorBox\Sdk\Model\EditUserSettingsResponse
```

Edit User Settings

### Overview  Edits a user's TorBox settings. These values take effect immediately. Please view the body to read about allowed options and parameters.  To get the user settings, simply use the \"[Get User Data](https://api.torbox.app/docs#/User/get_user_data)\" endpoint, while sending the \"?settings=true\" parameter  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$baseSettingsModel = {"email_notifications":true,"web_notifications":true,"mobile_notifications":true,"rss_notifications":true,"download_speed_in_tab":true,"stremio_quality":[0,1,2,3,4,5,6,7,8,9,10,11],"stremio_resolution":[0,1,2,3],"stremio_language":[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21],"stremio_cache":[1,2,3],"stremio_size_lower":0,"google_drive_folder_id":"string","onedrive_save_path":"string","discord_id":"string","discord_notifications":true,"stremio_allow_adult":true,"stremio_seed_torrents":1,"seed_torrents":1,"allow_zipped":true,"stremio_allow_zipped":true,"onefichier_folder_id":"string","gofile_folder_id":"string","webhook_notifications":true,"webhook_url":"https://example.com/webhook","telegram_notifications":true,"telegram_id":"string","mega_email":"string","mega_password":"string","stremio_sort":"seeders","cdn_selection":"string","stremio_use_custom_search_engines":true,"stremio_result_sort":"torrent","webdav_use_local_files":true,"stremio_legacy_your_media":true,"stremio_only_your_media_streams":true,"stremio_disable_your_media_streams":true,"webdav_use_folder_view":true,"webdav_flatten":true,"stremio_limit_per_resolution_torrent":0,"stremio_limit_per_resolution_usenet":0,"stremio_size_upper":0,"stremio_torrent_seeders_cutoff":0,"pixeldrain_api_key":"string","onefichier_api_key":"string","gofile_api_key":"string","patreon_id":"string","stremio_wait_for_download_usenet":true,"stremio_wait_for_download_torrent":true,"stremio_disable_filtered_note":true,"stremio_emoji_in_description":true,"dashboard_filter":{"torrents":false,"usenet_downloads":false,"web_downloads":false,"active":false,"inactive":false,"queued":false,"downloading":false,"uploading":false,"processing":false,"download_ready":false,"cached":false,"uncached":false,"private":false,"borrowed":false},"web_player_always_transcode":true,"web_player_always_skip_intro":true,"web_player_audio_preferred_language":"string","web_player_subtitle_preferred_language":"string","web_player_disable_prestream_selector":true,"dashboard_sort":"default","web_player_disable_next_up_dialogue":true,"web_player_enable_scrobbling":true,"append_filename_to_links":true}; // \TorBox\Sdk\Model\BaseSettingsModel

try {
    $result = $apiInstance->editUserSettings($baseSettingsModel);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->editUserSettings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **baseSettingsModel** | [**\TorBox\Sdk\Model\BaseSettingsModel**](../Model/BaseSettingsModel.md)|  | |

### Return type

[**\TorBox\Sdk\Model\EditUserSettingsResponse**](../Model/EditUserSettingsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConfirmationCode()`

```php
getConfirmationCode(): \TorBox\Sdk\Model\GetConfirmationCodeResponse
```

Get Confirmation Code

### Overview  Requests a 6 digit code to be sent to the user's email for verification. Used to verify a user actually wants to perform a potentially dangerous action.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getConfirmationCode();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getConfirmationCode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetConfirmationCodeResponse**](../Model/GetConfirmationCodeResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReferralData()`

```php
getReferralData(): \TorBox\Sdk\Model\GetReferralDataResponse
```

Get Referral Data

### Overview  Use this endpoint to get the user's referral data. This includes information such as how many referrals they have made, and their referral code.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getReferralData();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getReferralData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetReferralDataResponse**](../Model/GetReferralDataResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubscriptions()`

```php
getSubscriptions(): \TorBox\Sdk\Model\GetSubscriptionsResponse
```

Get Subscriptions

### Overview  Gets a users subscriptions. This includes active and inactive subscriptions for all payment processors.  It should be noted that \"plan_code\" is not normalized to the standard plan codes such as 1, 2, or 3. These \"plan_code\"s are payment processor specific and used internally. If you want to display these subscriptions, use the \"plan_name\".  For displaying information to users, use the \"status\", \"gateway\", and \"plan_name\". No other information is relevant to the user, and the rest is used for TorBox internally.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getSubscriptions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getSubscriptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetSubscriptionsResponse**](../Model/GetSubscriptionsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTokenFromDeviceCodeProcess()`

```php
getTokenFromDeviceCodeProcess($deviceTokenSchema): \TorBox\Sdk\Model\GetTokenFromDeviceCodeProcessResponse
```

Get Token From Device Code Process

### Overview  Gets the user's API token from the device code authorization process. This endpoint is expected to be polled in interval until it returns success, or until the expiry has passed. All data you need for this request is in the [original request](https://api.torbox.app/docs#/User/start_device_code_authorization_process), which includes the interval to be polled by, the expiry time to stop at, and `device_code` to be sent to the API to get the correct data.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$deviceTokenSchema = {"device_code":"XXXXXXXXXXXXXXXXXXXXXXXXX"}; // \TorBox\Sdk\Model\DeviceTokenSchema

try {
    $result = $apiInstance->getTokenFromDeviceCodeProcess($deviceTokenSchema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getTokenFromDeviceCodeProcess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deviceTokenSchema** | [**\TorBox\Sdk\Model\DeviceTokenSchema**](../Model/DeviceTokenSchema.md)|  | |

### Return type

[**\TorBox\Sdk\Model\GetTokenFromDeviceCodeProcessResponse**](../Model/GetTokenFromDeviceCodeProcessResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTransactionPdf()`

```php
getTransactionPdf($transactionId): string
```

Get Transaction PDF

### Overview  Generates a PDF of the transaction information. Requires the transaction ID from the \"Get Transactions\" request.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transactionId = 'transactionId_example'; // string | The transaction ID that you want to generate the PDF for.

try {
    $result = $apiInstance->getTransactionPdf($transactionId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getTransactionPdf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **transactionId** | **string**| The transaction ID that you want to generate the PDF for. | |

### Return type

**string**

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTransactions()`

```php
getTransactions(): \TorBox\Sdk\Model\GetTransactionsResponse
```

Get Transactions

### Overview  Use this endpoint to get the user's list of transactions. This data isn't exactly relevant to a third party developer, unless you want to build full parity with TorBox's dashboard, or simply want to show this information.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getTransactions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getTransactions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetTransactionsResponse**](../Model/GetTransactionsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserData()`

```php
getUserData($settings, $downloadStats, $referral): \TorBox\Sdk\Model\GetUserDataResponse
```

Get User Data

### Overview  Gets a users account data and information.  ### Plans  `0` is Free plan  `1` is Essential plan (_$3 plan_)  `2` is Pro plan (_$10 plan_)  `3` is Standard plan (_$5 plan_)  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$settings = false; // bool | Allows you to retrieve user settings.
$downloadStats = false; // bool
$referral = false; // bool

try {
    $result = $apiInstance->getUserData($settings, $downloadStats, $referral);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getUserData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **settings** | **bool**| Allows you to retrieve user settings. | [optional] [default to false] |
| **downloadStats** | **bool**|  | [optional] [default to false] |
| **referral** | **bool**|  | [optional] [default to false] |

### Return type

[**\TorBox\Sdk\Model\GetUserDataResponse**](../Model/GetUserDataResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserStats()`

```php
getUserStats($general, $bandwidth, $bandwidthGrouping): \TorBox\Sdk\Model\GetUserStatsResponse
```

Get User Stats

### Overview  Gets a users stats. This data is currently split into two sections, \"general\" and \"bandwidth\". General shows general data, such as \"Total Data Downloaded\", \"Total Data Egress\", \"Overall Ratio\", and \"Total Downloaded\". Bandwidth shows the amount of bandwidth a user has downloaded within the past 30 days. We don't store this data for longer than 30 days, and it can be made more or less granular. Makes cool graphs!  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$general = true; // bool | Retrieve general stats.
$bandwidth = false; // bool | Retrieve bandwidth stats.
$bandwidthGrouping = 'day'; // string | If the \"bandwidth\" query parameter is sent, this value is used. Allowed is \"hour\", \"day\", \"week\", and \"month\", this narrates how bandwidth is grouped. More granular shows more information.

try {
    $result = $apiInstance->getUserStats($general, $bandwidth, $bandwidthGrouping);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getUserStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **general** | **bool**| Retrieve general stats. | [optional] [default to true] |
| **bandwidth** | **bool**| Retrieve bandwidth stats. | [optional] [default to false] |
| **bandwidthGrouping** | **string**| If the \&quot;bandwidth\&quot; query parameter is sent, this value is used. Allowed is \&quot;hour\&quot;, \&quot;day\&quot;, \&quot;week\&quot;, and \&quot;month\&quot;, this narrates how bandwidth is grouped. More granular shows more information. | [optional] [default to &#39;day&#39;] |

### Return type

[**\TorBox\Sdk\Model\GetUserStatsResponse**](../Model/GetUserStatsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refreshApiToken()`

```php
refreshApiToken($refreshTokenSchema): \TorBox\Sdk\Model\RefreshApiTokenResponse
```

Refresh API Token

### Overview  If you want a new API token, or your old one has been compromised, you may request a new one. If you happen to forget the token, go the [TorBox settings page ](https://torbox.app/settings) and copy the current one. If this still doesn't work, you may contact us at our support email for a new one.  ### Authorization  Requires an API key using the Authorization Bearer Header as well as passing the `session_token` from the website to be passed in the body. You can find the `session_token` in the localStorage of your browser on any TorBox.app page under the key `torbox_session_token`. This is a temporary token that only lasts for 1 hour, which is why it is used here to verify the identity of a user as well as their API token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$refreshTokenSchema = {"session_token":"string"}; // \TorBox\Sdk\Model\RefreshTokenSchema

try {
    $result = $apiInstance->refreshApiToken($refreshTokenSchema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->refreshApiToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **refreshTokenSchema** | [**\TorBox\Sdk\Model\RefreshTokenSchema**](../Model/RefreshTokenSchema.md)|  | |

### Return type

[**\TorBox\Sdk\Model\RefreshApiTokenResponse**](../Model/RefreshApiTokenResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `startDeviceCodeAuthorizationProcess()`

```php
startDeviceCodeAuthorizationProcess($app): \TorBox\Sdk\Model\StartDeviceCodeAuthorizationProcessResponse
```

Start Device Code Authorization Process

### Overview  Starts the device code authorization process. Returns all the necessary information to complete the rest of the flow. This includes the following:  - `device_code` - The code your app will use for consecutive requests for getting the user token.  - `code` - This is the 6 digit code that you show to the user to be entered at the following verification_url.  - `verification_url` - This url which you will show as a QR code.  - `friendly_verification_url` - The friendly short url which you can show as plain text to user if they cannot use the QR code method.   You may also submit the `app` parameter to this request to show your app name on the `verification_url` page. This concretes user trust in authorizing your application to use their TorBox account. This is not required, but is a good idea. Default is \"Third Party App\". This name is also only allowed to be alpha-numeric characters (_A-Z,0-9_). Anything else will be filtered our when being shown to the user. The `friendly_verification_url` will always show \"Third Party App\" to keep the URL short.  The device_code is only valid for 10 minutes. Make sure the user is aware of this time limit so they submit and login before this time limit is over.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$app = 'Third Party App'; // string | The app name that the user will see when verifying the code. This should be the name of your app.

try {
    $result = $apiInstance->startDeviceCodeAuthorizationProcess($app);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->startDeviceCodeAuthorizationProcess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app** | **string**| The app name that the user will see when verifying the code. This should be the name of your app. | [optional] [default to &#39;Third Party App&#39;] |

### Return type

[**\TorBox\Sdk\Model\StartDeviceCodeAuthorizationProcessResponse**](../Model/StartDeviceCodeAuthorizationProcessResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
