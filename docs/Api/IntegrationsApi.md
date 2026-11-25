# TorBox\Sdk\IntegrationsApi

Integrations is the route for connecting to 3rd party services. This includes OAuth, Jobs, and creating integration connections.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**authenticateOauth()**](IntegrationsApi.md#authenticateOauth) | **GET** /v1/api/integration/oauth/{provider} | Authenticate OAuth |
| [**cancelSpecificJob()**](IntegrationsApi.md#cancelSpecificJob) | **DELETE** /v1/api/integration/job/{job_id} | Cancel Specific Job |
| [**getAllJobs()**](IntegrationsApi.md#getAllJobs) | **GET** /v1/api/integration/jobs | Get All Jobs |
| [**getAllJobsByHash()**](IntegrationsApi.md#getAllJobsByHash) | **GET** /v1/api/integration/jobs/{hash} | Get All Jobs By Hash |
| [**getOauthIntegrations()**](IntegrationsApi.md#getOauthIntegrations) | **GET** /v1/api/integration/oauth/me | Get OAuth Integrations |
| [**getSpecificJob()**](IntegrationsApi.md#getSpecificJob) | **GET** /v1/api/integration/job/{job_id} | Get Specific Job |
| [**linkDiscordRoles()**](IntegrationsApi.md#linkDiscordRoles) | **POST** /v1/api/integration/oauth/discord/linked_roles | Link Discord Roles |
| [**oauthCallbackGet()**](IntegrationsApi.md#oauthCallbackGet) | **GET** /v1/api/integration/oauth/{provider}/callback | OAuth Callback Get |
| [**oauthCallbackPost()**](IntegrationsApi.md#oauthCallbackPost) | **POST** /v1/api/integration/oauth/{provider}/callback | OAuth Callback Post |
| [**oauthSuccess()**](IntegrationsApi.md#oauthSuccess) | **GET** /v1/api/integration/oauth/{provider}/success | OAuth Success |
| [**registerOauthLink()**](IntegrationsApi.md#registerOauthLink) | **POST** /v1/api/integration/oauth/{provider}/register | Register OAuth Link |
| [**unregisterOauthLink()**](IntegrationsApi.md#unregisterOauthLink) | **DELETE** /v1/api/integration/oauth/{provider}/unregister | Unregister OAuth Link |
| [**uploadTo1fichier()**](IntegrationsApi.md#uploadTo1fichier) | **POST** /v1/api/integration/1fichier | Upload To 1Fichier |
| [**uploadToDropbox()**](IntegrationsApi.md#uploadToDropbox) | **POST** /v1/api/integration/dropbox | Upload To Dropbox |
| [**uploadToGofile()**](IntegrationsApi.md#uploadToGofile) | **POST** /v1/api/integration/gofile | Upload To Gofile |
| [**uploadToGoogleDrive()**](IntegrationsApi.md#uploadToGoogleDrive) | **POST** /v1/api/integration/googledrive | Upload To Google Drive |
| [**uploadToOnedrive()**](IntegrationsApi.md#uploadToOnedrive) | **POST** /v1/api/integration/onedrive | Upload To OneDrive |
| [**uploadToPixeldrain()**](IntegrationsApi.md#uploadToPixeldrain) | **POST** /v1/api/integration/pixeldrain | Upload To Pixeldrain |


## `authenticateOauth()`

```php
authenticateOauth($provider)
```

Authenticate OAuth

### Overview  Starts the OAuth login with another service. This is a browser redirect, not a call for a script: open it in the user's browser. It answers with a redirect to the login page of the service named in `provider`. When the user has approved, the service sends the browser back to the callback route of this API, `https://api.torbox.app/v1/api/integration/oauth/{provider}/callback`, which finishes the login.  The accepted providers and where the browser is sent:  - `google` -> `https://accounts.google.com/o/oauth2/auth`, asking for the scopes `https://www.googleapis.com/auth/drive.file` and `https://www.googleapis.com/auth/userinfo.email` - `dropbox` -> `https://www.dropbox.com/oauth2/authorize`, asking for `files.content.write sharing.write` - `discord` -> `https://discord.com/api/oauth2/authorize`, asking for `identify role_connections.write` - `onedrive` -> `https://login.microsoftonline.com/common/oauth2/v2.0/authorize`, asking for `files.readwrite.all` - `patreon` -> `https://www.patreon.com/oauth2/authorize`, asking for `identity` - `apple` -> the Apple sign-in page, asking for `openid email`. Apple is asked to send the result back as a form POST. - `anilist` -> `https://anilist.co/api/v2/oauth/authorize` - `mal` -> `https://myanimelist.net/v1/oauth2/authorize`, asking for `write:users` - `trakt` -> `https://trakt.tv/oauth/authorize` - `simkl` -> `https://simkl.com/oauth/authorize`  Any other provider is answered with a JSON error instead of a redirect.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$provider = 'provider_example'; // string | The service to log in with. One of `google`, `dropbox`, `discord`, `onedrive`, `patreon`, `apple`, `anilist`, `mal`, `trakt` or `simkl`.

try {
    $apiInstance->authenticateOauth($provider);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->authenticateOauth: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service to log in with. One of &#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60;, &#x60;patreon&#x60;, &#x60;apple&#x60;, &#x60;anilist&#x60;, &#x60;mal&#x60;, &#x60;trakt&#x60; or &#x60;simkl&#x60;. | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelSpecificJob()`

```php
cancelSpecificJob($jobId): \TorBox\Sdk\Model\CancelSpecificJobResponse
```

Cancel Specific Job

### Overview  Cancels a job or deletes the job. Cancels while in progess (pending, uploading), or deletes the job any other time. It will delete it from the database completely.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$jobId = 56; // int

try {
    $result = $apiInstance->cancelSpecificJob($jobId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->cancelSpecificJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jobId** | **int**|  | |

### Return type

[**\TorBox\Sdk\Model\CancelSpecificJobResponse**](../Model/CancelSpecificJobResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllJobs()`

```php
getAllJobs(): \TorBox\Sdk\Model\GetAllJobsResponse
```

Get All Jobs

### Overview  Gets all the jobs attached to a user account. This is good for an overall view of the jobs, such as on a dashboard, or something similar.  ### Statuses  - \"pending\" -> Upload is still waiting in the queue. Waiting for spot to upload. - \"uploading\" -> Upload is uploading to the proper remote. Progress will be updated as upload continues. - \"completed\" -> Upload has successfully been uploaded. Progress will be at 1, and the download URL will be populated.  - \"failed\" -> The upload has failed. Check the Detail key for information.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAllJobs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getAllJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetAllJobsResponse**](../Model/GetAllJobsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllJobsByHash()`

```php
getAllJobsByHash($hash): \TorBox\Sdk\Model\GetAllJobsByHashResponse
```

Get All Jobs By Hash

### Overview  Gets all jobs that match a specific hash. Good for checking on specific downloads such as a download page, that could contain a lot of jobs.  ### Statuses  - \"pending\" -> Upload is still waiting in the queue. Waiting for spot to upload. - \"uploading\" -> Upload is uploading to the proper remote. Progress will be updated as upload continues. - \"completed\" -> Upload has successfully been uploaded. Progress will be at 1, and the download URL will be populated. - \"failed\" -> The upload has failed. Check the Detail key for information.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hash = 'hash_example'; // string

try {
    $result = $apiInstance->getAllJobsByHash($hash);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getAllJobsByHash: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hash** | **string**|  | |

### Return type

[**\TorBox\Sdk\Model\GetAllJobsByHashResponse**](../Model/GetAllJobsByHashResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getOauthIntegrations()`

```php
getOauthIntegrations(): \TorBox\Sdk\Model\GetOauthIntegrationsResponse
```

Get OAuth Integrations

### Overview  Shows which tracking services are linked to your account through an OAuth link. `data` has one boolean for each of `trakt`, `mal`, `anilist` and `simkl`, true when a link for that service is stored on your account. A link is stored with Register OAuth Link and removed with Unregister OAuth Link.  Only these four services are reported. A link for any other provider that Register OAuth Link accepts, such as `discord`, is not part of the answer. The answer also does not say whether a stored token still works. If the lookup itself fails, `data` is an empty object under the same success message.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getOauthIntegrations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getOauthIntegrations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetOauthIntegrationsResponse**](../Model/GetOauthIntegrationsResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSpecificJob()`

```php
getSpecificJob($jobId): \TorBox\Sdk\Model\GetSpecificJobResponse
```

Get Specific Job

### Overview  Gets a specifc job using the Job's ID. To get the ID, you will have to Get All Jobs, and get the ID you want.  ### Statuses  - \"pending\" -> Upload is still waiting in the queue. Waiting for spot to upload. - \"uploading\" -> Upload is uploading to the proper remote. Progress will be updated as upload continues. - \"completed\" -> Upload has successfully been uploaded. Progress will be at 1, and the download URL will be populated. - \"failed\" -> The upload has failed. Check the Detail key for information.   ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$jobId = 56; // int

try {
    $result = $apiInstance->getSpecificJob($jobId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->getSpecificJob: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jobId** | **int**|  | |

### Return type

[**\TorBox\Sdk\Model\GetSpecificJobResponse**](../Model/GetSpecificJobResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `linkDiscordRoles()`

```php
linkDiscordRoles($linkedRolesData): \TorBox\Sdk\Model\LinkDiscordRolesResponse
```

Link Discord Roles

### Overview  Updates the Discord linked roles of a user from their TorBox account. Send a Discord OAuth access token of the user in `discord_token`. The token is issued by Discord, not by TorBox: it is the `token` handed over at the end of the login started by Authenticate OAuth with the provider `discord`, which asks Discord for the `identify` and `role_connections.write` scopes.  TorBox reads the Discord user behind the token and writes the TorBox role connection of that Discord user: the platform name \"TorBox\", that the user has signed up, the date the TorBox account was created, and the key of the account's plan: `essential_plan` for plan 1, `pro_plan` for plan 2 or `standard_plan` for plan 3.  Once Discord has accepted the update, the Discord user id is saved as the `discord_id` of your TorBox settings. The answer carries no data.  When Discord returns no user for the token, or does not accept the update, the answer is an error and the Discord user id is not saved.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$linkedRolesData = {"discord_token":"string"}; // \TorBox\Sdk\Model\LinkedRolesData

try {
    $result = $apiInstance->linkDiscordRoles($linkedRolesData);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->linkDiscordRoles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **linkedRolesData** | [**\TorBox\Sdk\Model\LinkedRolesData**](../Model/LinkedRolesData.md)|  | |

### Return type

[**\TorBox\Sdk\Model\LinkDiscordRolesResponse**](../Model/LinkDiscordRolesResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `oauthCallbackGet()`

```php
oauthCallbackGet($provider)
```

OAuth Callback Get

### Overview  The address a service sends the user's browser back to after the login started by Authenticate OAuth. It is reached by the browser on its way back from the service, not called by you. The service adds its `code` and `state` to the query string.  TorBox exchanges the code for the service's tokens, looks up who the user is at that service, and redirects the browser to the TorBox website with the result in the query string:  `https://torbox.app/oauth/{provider}/success?token=...&expires_in=...&expires_at=...&user_id=...&id_token=...&nonce=...&refresh_token=...`  - `token` -> the access token the service issued - `refresh_token` -> the refresh token the service issued - `expires_in`, `expires_at` -> as found in the service's token answer - `user_id` -> who the user is at the service. The email address for `google` and `apple`, the `email` field of the Discord user for `discord`, the user id for `patreon`, `anilist` and `mal`, the user name for `trakt` and `simkl`. Not set for `dropbox` and `onedrive`. - `id_token` -> the ID token for `google` and `apple`, the Discord user id for `discord`. Not set for the other providers. - `nonce` -> the name of the provider  A value the service did not give is sent as the text `None`.  This route stores nothing on a TorBox account. The tokens it hands over are the ones Register OAuth Link, Link Discord Roles and the upload routes take.  If the login was cancelled, has expired or fails, the route answers with a JSON error instead of a redirect.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$provider = 'provider_example'; // string | The service the login was started with. One of `google`, `dropbox`, `discord`, `onedrive`, `patreon`, `apple`, `anilist`, `mal`, `trakt` or `simkl`.

try {
    $apiInstance->oauthCallbackGet($provider);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->oauthCallbackGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service the login was started with. One of &#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60;, &#x60;patreon&#x60;, &#x60;apple&#x60;, &#x60;anilist&#x60;, &#x60;mal&#x60;, &#x60;trakt&#x60; or &#x60;simkl&#x60;. | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `oauthCallbackPost()`

```php
oauthCallbackPost($provider)
```

OAuth Callback Post

### Overview  The same callback as OAuth Callback Get, for a service that sends the browser back with a form POST instead of a GET. Apple does this: the login for `apple` asks for the result as a form POST, and this route reads the form fields `state` and `code` from it. It is reached by the browser on its way back from the service, not called by you.  TorBox exchanges the code for the service's tokens, looks up who the user is at that service, and redirects the browser to the TorBox website with the result in the query string:  `https://torbox.app/oauth/{provider}/success?token=...&expires_in=...&expires_at=...&user_id=...&id_token=...&nonce=...&refresh_token=...`  The query parameters are the ones described under OAuth Callback Get. For `apple`, `user_id` is the email address from Apple's ID token and `id_token` is that ID token. A value the service did not give is sent as the text `None`.  This route stores nothing on a TorBox account. If the login was cancelled, has expired or fails, the route answers with a JSON error instead of a redirect.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$provider = 'provider_example'; // string | The service the login was started with. One of `google`, `dropbox`, `discord`, `onedrive`, `patreon`, `apple`, `anilist`, `mal`, `trakt` or `simkl`.

try {
    $apiInstance->oauthCallbackPost($provider);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->oauthCallbackPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service the login was started with. One of &#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60;, &#x60;patreon&#x60;, &#x60;apple&#x60;, &#x60;anilist&#x60;, &#x60;mal&#x60;, &#x60;trakt&#x60; or &#x60;simkl&#x60;. | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `oauthSuccess()`

```php
oauthSuccess($provider): \TorBox\Sdk\Model\OauthSuccessResponse
```

OAuth Success

### Overview  Answers with a fixed success message for the providers `google`, `dropbox`, `discord`, `onedrive` and `patreon`. It reads nothing but the provider name and hands over no token: `data` is always null. Any other provider is answered with a JSON error.  This is not where the OAuth callback redirects to. The callback sends the browser to the page with the same path on the TorBox website, `https://torbox.app/oauth/{provider}/success`, with the tokens in the query string. This route on the API takes no part in handing them over.  ### Authorization  None required.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$provider = 'provider_example'; // string | The service. One of `google`, `dropbox`, `discord`, `onedrive` or `patreon`.

try {
    $result = $apiInstance->oauthSuccess($provider);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->oauthSuccess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service. One of &#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60; or &#x60;patreon&#x60;. | |

### Return type

[**\TorBox\Sdk\Model\OauthSuccessResponse**](../Model/OauthSuccessResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `registerOauthLink()`

```php
registerOauthLink($provider, $oAuthRegisterRequest): \TorBox\Sdk\Model\RegisterOauthLinkResponse
```

Register OAuth Link

### Overview  Stores an OAuth link to another service on your TorBox account. Send the access token and the refresh token that the service issued for the user. TorBox does not issue these tokens: they are the `token` and `refresh_token` handed over at the end of the login started by Authenticate OAuth.  Both tokens are stored encrypted. If the account already has a link for that provider, its tokens are replaced and the link is marked active again. The tokens are not checked with the service when they are registered. The stored tokens of `mal`, `trakt`, `anilist` and `discord` links are refreshed once a day with the refresh token.  Get OAuth Integrations shows whether a `trakt`, `mal`, `anilist` or `simkl` link is stored.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$provider = 'provider_example'; // string | The service to link. One of `google`, `dropbox`, `discord`, `onedrive`, `patreon`, `apple`, `anilist`, `mal`, `trakt` or `simkl`.
$oAuthRegisterRequest = {"token":"string","refresh_token":"string"}; // \TorBox\Sdk\Model\OAuthRegisterRequest

try {
    $result = $apiInstance->registerOauthLink($provider, $oAuthRegisterRequest);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->registerOauthLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service to link. One of &#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60;, &#x60;patreon&#x60;, &#x60;apple&#x60;, &#x60;anilist&#x60;, &#x60;mal&#x60;, &#x60;trakt&#x60; or &#x60;simkl&#x60;. | |
| **oAuthRegisterRequest** | [**\TorBox\Sdk\Model\OAuthRegisterRequest**](../Model/OAuthRegisterRequest.md)|  | |

### Return type

[**\TorBox\Sdk\Model\RegisterOauthLinkResponse**](../Model/RegisterOauthLinkResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unregisterOauthLink()`

```php
unregisterOauthLink($provider): \TorBox\Sdk\Model\UnregisterOauthLinkResponse
```

Unregister OAuth Link

### Overview  Removes the OAuth link to a service from your TorBox account by deleting the stored tokens. The tokens are deleted from TorBox only, nothing is revoked at the service itself.  The route answers with success whether or not a link existed. It does not check the provider name either: a name that was never registered removes nothing and is still answered with success.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$provider = 'provider_example'; // string | The service to unlink, by the name it was registered with in Register OAuth Link (`google`, `dropbox`, `discord`, `onedrive`, `patreon`, `apple`, `anilist`, `mal`, `trakt` or `simkl`). The name is not checked by the route.

try {
    $result = $apiInstance->unregisterOauthLink($provider);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->unregisterOauthLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **provider** | **string**| The service to unlink, by the name it was registered with in Register OAuth Link (&#x60;google&#x60;, &#x60;dropbox&#x60;, &#x60;discord&#x60;, &#x60;onedrive&#x60;, &#x60;patreon&#x60;, &#x60;apple&#x60;, &#x60;anilist&#x60;, &#x60;mal&#x60;, &#x60;trakt&#x60; or &#x60;simkl&#x60;). The name is not checked by the route. | |

### Return type

[**\TorBox\Sdk\Model\UnregisterOauthLinkResponse**](../Model/UnregisterOauthLinkResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadTo1fichier()`

```php
uploadTo1fichier($addTo1Fichier): \TorBox\Sdk\Model\UploadTo1fichierResponse
```

Upload To 1Fichier

### Overview  Uploads a file, or a zip of a whole download, from your TorBox account to 1Fichier. Send the `id` of the torrent, usenet download or web download, its `type`, and either the `file_id` of one file or `zip` set to true. `onefichier_token` is optional: with it the upload is made with that 1Fichier account's API token, without it the upload is sent without a 1Fichier login.  The route answers at once with a `job_id`. The upload itself runs in the background as a transfer job, and nothing is checked with 1Fichier before the answer, so a token 1Fichier does not accept only shows up as a failed job. Follow the job with Get Specific Job (`/v1/api/integration/job/{job_id}`), Get All Jobs (`/v1/api/integration/jobs`) or Get All Jobs By Hash (`/v1/api/integration/jobs/{hash}`), and stop it with Cancel Specific Job.  The job goes from \"pending\" through \"preparing\" and \"uploading\" to \"completed\" or \"failed\". Its `detail` says what it is doing or why it failed, and its `progress` runs from 0 to 1. When it is completed, its `download_url` is the 1Fichier download link of the file and you get an \"Upload Complete\" notification. A failed job is deleted about an hour after it failed, a completed job about 7 days after it completed.  A file larger than 2 GB (2,147,483,647 bytes) is not uploaded: the request is queued and the job fails. The download has to be cached on TorBox, otherwise the job fails. If you send neither `file_id` nor `zip`, the request is still queued, but there is no file to upload and the job fails. If your settings have a `onefichier_folder_id`, the file is put in that folder, but only when a `onefichier_token` is sent.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addTo1Fichier = {"id":0,"file_id":0,"zip":false,"type":"torrent","onefichier_token":"string"}; // \TorBox\Sdk\Model\AddTo1Fichier

try {
    $result = $apiInstance->uploadTo1fichier($addTo1Fichier);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadTo1fichier: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addTo1Fichier** | [**\TorBox\Sdk\Model\AddTo1Fichier**](../Model/AddTo1Fichier.md)|  | |

### Return type

[**\TorBox\Sdk\Model\UploadTo1fichierResponse**](../Model/UploadTo1fichierResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadToDropbox()`

```php
uploadToDropbox($addToDropbox)
```

Upload To Dropbox

### Overview  The Dropbox integration has been removed from TorBox. The route still exists, but it no longer uploads anything and never starts a transfer job. After the API key and the `type` are checked, every request is answered with status 400, the error `DIFF_ISSUE` and the detail \"Dropbox integration has been removed from TorBox.\"  The body fields are still read, so they are listed here, but none of them changes the answer. Use one of the other upload routes instead.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addToDropbox = {"id":0,"file_id":0,"zip":false,"type":"torrent","dropbox_token":"string"}; // \TorBox\Sdk\Model\AddToDropbox

try {
    $apiInstance->uploadToDropbox($addToDropbox);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadToDropbox: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addToDropbox** | [**\TorBox\Sdk\Model\AddToDropbox**](../Model/AddToDropbox.md)|  | |

### Return type

void (empty response body)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadToGofile()`

```php
uploadToGofile($addToGofile): \TorBox\Sdk\Model\UploadToGofileResponse
```

Upload To Gofile

### Overview  Uploads a file, or a zip of a whole download, from your TorBox account to Gofile. Send the `id` of the torrent, usenet download or web download, its `type`, and either the `file_id` of one file or `zip` set to true. `gofile_token` is optional: with it the upload is made with that Gofile account's API token, without it the upload is sent without a Gofile login.  The route answers at once with a `job_id`. The upload itself runs in the background as a transfer job, and nothing is checked with Gofile before the answer, so a token Gofile does not accept only shows up as a failed job. Follow the job with Get Specific Job (`/v1/api/integration/job/{job_id}`), Get All Jobs (`/v1/api/integration/jobs`) or Get All Jobs By Hash (`/v1/api/integration/jobs/{hash}`), and stop it with Cancel Specific Job.  The job goes from \"pending\" through \"preparing\" and \"uploading\" to \"completed\" or \"failed\". Its `detail` says what it is doing or why it failed, and its `progress` runs from 0 to 1. When it is completed, its `download_url` is the Gofile download page of the file and you get an \"Upload Complete\" notification. A failed job is deleted about an hour after it failed, a completed job about 7 days after it completed.  The download has to be cached on TorBox, otherwise the job fails. If you send neither `file_id` nor `zip`, the request is still queued, but there is no file to upload and the job fails. If your settings have a `gofile_folder_id`, the file is put in that folder, but only when a `gofile_token` is sent.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addToGofile = {"id":0,"file_id":0,"zip":false,"type":"torrent","gofile_token":"string"}; // \TorBox\Sdk\Model\AddToGofile

try {
    $result = $apiInstance->uploadToGofile($addToGofile);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadToGofile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addToGofile** | [**\TorBox\Sdk\Model\AddToGofile**](../Model/AddToGofile.md)|  | |

### Return type

[**\TorBox\Sdk\Model\UploadToGofileResponse**](../Model/UploadToGofileResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadToGoogleDrive()`

```php
uploadToGoogleDrive($addToGoogleDrive): \TorBox\Sdk\Model\UploadToGoogleDriveResponse
```

Upload To Google Drive

### Overview  Uploads a file, or a zip of a whole download, from your TorBox account to a Google Drive. Send the `id` of the torrent, usenet download or web download, its `type`, and either the `file_id` of one file or `zip` set to true. In `google_token` you send a Google OAuth access token for the Drive to upload to. The login started by Authenticate OAuth with the provider `google` asks Google for the `drive.file` scope and ends with such a token.  The route answers at once with a `job_id`. The upload itself runs in the background as a transfer job, and nothing is checked with Google before the answer, so a token Google does not accept only shows up as a failed job. Follow the job with Get Specific Job (`/v1/api/integration/job/{job_id}`), Get All Jobs (`/v1/api/integration/jobs`) or Get All Jobs By Hash (`/v1/api/integration/jobs/{hash}`), and stop it with Cancel Specific Job.  The job goes from \"pending\" through \"preparing\" and \"uploading\" to \"completed\" or \"failed\". Its `detail` says what it is doing or why it failed, and its `progress` runs from 0 to 1. When it is completed, its `download_url` is the link to the file on Google Drive and you get an \"Upload Complete\" notification. A failed job is deleted about an hour after it failed, a completed job about 7 days after it completed.  The download has to be cached on TorBox, otherwise the job fails. If you send neither `file_id` nor `zip`, the request is still queued, but there is no file to upload and the job fails. If your settings have a `google_drive_folder_id`, the file is put in that folder.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addToGoogleDrive = {"id":0,"file_id":0,"zip":false,"type":"torrent","google_token":"string"}; // \TorBox\Sdk\Model\AddToGoogleDrive

try {
    $result = $apiInstance->uploadToGoogleDrive($addToGoogleDrive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadToGoogleDrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addToGoogleDrive** | [**\TorBox\Sdk\Model\AddToGoogleDrive**](../Model/AddToGoogleDrive.md)|  | |

### Return type

[**\TorBox\Sdk\Model\UploadToGoogleDriveResponse**](../Model/UploadToGoogleDriveResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadToOnedrive()`

```php
uploadToOnedrive($addToOnedrive): \TorBox\Sdk\Model\UploadToOnedriveResponse
```

Upload To OneDrive

### Overview  Uploads a file, or a zip of a whole download, from your TorBox account to a OneDrive. Send the `id` of the torrent, usenet download or web download, its `type`, and either the `file_id` of one file or `zip` set to true. In `onedrive_token` you send a OneDrive (Microsoft) OAuth access token for the drive to upload to. The login started by Authenticate OAuth with the provider `onedrive` asks Microsoft for the `files.readwrite.all` scope and ends with such a token.  The route answers at once with a `job_id`. The upload itself runs in the background as a transfer job, and nothing is checked with OneDrive before the answer, so a token OneDrive does not accept only shows up as a failed job. Follow the job with Get Specific Job (`/v1/api/integration/job/{job_id}`), Get All Jobs (`/v1/api/integration/jobs`) or Get All Jobs By Hash (`/v1/api/integration/jobs/{hash}`), and stop it with Cancel Specific Job.  The job goes from \"pending\" through \"preparing\" and \"uploading\" to \"completed\" or \"failed\". Its `detail` says what it is doing or why it failed, and its `progress` runs from 0 to 1. When it is completed, its `download_url` is the link to the file on OneDrive and you get an \"Upload Complete\" notification. A failed job is deleted about an hour after it failed, a completed job about 7 days after it completed.  The download has to be cached on TorBox, otherwise the job fails. If you send neither `file_id` nor `zip`, the request is still queued, but there is no file to upload and the job fails. The file is saved under the `onedrive_save_path` of your settings, or in the root of the drive when that setting is empty. A file with the same name in that place is replaced.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addToOnedrive = {"id":0,"file_id":0,"zip":false,"type":"torrent","onedrive_token":"string"}; // \TorBox\Sdk\Model\AddToOnedrive

try {
    $result = $apiInstance->uploadToOnedrive($addToOnedrive);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadToOnedrive: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addToOnedrive** | [**\TorBox\Sdk\Model\AddToOnedrive**](../Model/AddToOnedrive.md)|  | |

### Return type

[**\TorBox\Sdk\Model\UploadToOnedriveResponse**](../Model/UploadToOnedriveResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadToPixeldrain()`

```php
uploadToPixeldrain($addToPixeldrain): \TorBox\Sdk\Model\UploadToPixeldrainResponse
```

Upload To Pixeldrain

### Overview  Uploads a file, or a zip of a whole download, from your TorBox account to Pixeldrain. Send the `id` of the torrent, usenet download or web download, its `type`, either the `file_id` of one file or `zip` set to true, and the API key of the Pixeldrain account to upload to in `pixeldrain_token`.  The route accepts a request without `pixeldrain_token`, but nothing can be uploaded without one: the job then fails with the detail \"No API key provided. Please provide an API key to upload to Pixeldrain.\" Only the key sent in the request is used.  The route answers at once with a `job_id`. The upload itself runs in the background as a transfer job, and nothing is checked with Pixeldrain before the answer, so a key Pixeldrain does not accept only shows up as a failed job. Follow the job with Get Specific Job (`/v1/api/integration/job/{job_id}`), Get All Jobs (`/v1/api/integration/jobs`) or Get All Jobs By Hash (`/v1/api/integration/jobs/{hash}`), and stop it with Cancel Specific Job.  The job goes from \"pending\" through \"preparing\" and \"uploading\" to \"completed\" or \"failed\". Its `detail` says what it is doing or why it failed, and its `progress` runs from 0 to 1. When it is completed, its `download_url` is the Pixeldrain link of the file (`https://pixeldrain.com/u/...`) and you get an \"Upload Complete\" notification. A failed job is deleted about an hour after it failed, a completed job about 7 days after it completed.  A file of 100 GB (107,374,182,400 bytes) or more is not uploaded: the request is queued and the job fails. The download has to be cached on TorBox, otherwise the job fails. Send `file_id` or `zip`: with neither there is no file to upload and the job never completes.  ### Authorization  Requires an API key using the Authorization Bearer Header.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\IntegrationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$addToPixeldrain = {"id":0,"file_id":0,"zip":false,"type":"torrent","pixeldrain_token":"string"}; // \TorBox\Sdk\Model\AddToPixeldrain

try {
    $result = $apiInstance->uploadToPixeldrain($addToPixeldrain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IntegrationsApi->uploadToPixeldrain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **addToPixeldrain** | [**\TorBox\Sdk\Model\AddToPixeldrain**](../Model/AddToPixeldrain.md)|  | |

### Return type

[**\TorBox\Sdk\Model\UploadToPixeldrainResponse**](../Model/UploadToPixeldrainResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
