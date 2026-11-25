# TorBox\Sdk\VendorsApi

A vendor account lets one TorBox account own and manage other TorBox user accounts. It is registered on top of your existing TorBox account, starts with the status \&quot;pending\&quot; while it waits for approval, and carries its own name, URL, plan, paid-until date and user limit.

All URIs are relative to https://api.torbox.app, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getVendorAccount()**](VendorsApi.md#getVendorAccount) | **GET** /v1/api/vendors/account | Get Vendor Account |
| [**getVendorUser()**](VendorsApi.md#getVendorUser) | **GET** /v1/api/vendors/getaccount | Get Vendor User |
| [**getVendorUsers()**](VendorsApi.md#getVendorUsers) | **GET** /v1/api/vendors/getaccounts | Get Vendor Users |
| [**refreshVendorUsers()**](VendorsApi.md#refreshVendorUsers) | **PATCH** /v1/api/vendors/refresh | Refresh Vendor Users |
| [**registerVendor()**](VendorsApi.md#registerVendor) | **POST** /v1/api/vendors/register | Register Vendor |
| [**registerVendorUser()**](VendorsApi.md#registerVendorUser) | **POST** /v1/api/vendors/registeruser | Register Vendor User |
| [**removeVendorUser()**](VendorsApi.md#removeVendorUser) | **DELETE** /v1/api/vendors/removeuser | Remove Vendor User |
| [**updateVendorAccount()**](VendorsApi.md#updateVendorAccount) | **PUT** /v1/api/vendors/updateaccount | Update Vendor Account |


## `getVendorAccount()`

```php
getVendorAccount(): \TorBox\Sdk\Model\GetVendorAccountResponse
```

Get Vendor Account

### Overview  Gets the vendor account that is registered under your TorBox account.  ##### Response Keys  - \"vendor_id\" `the id of the vendor account. Users owned by the vendor have this value as their \"vendor_id\".` - \"vendor_token\" `the vendor token that was generated when the vendor account was registered.` - \"vendor_email\" `the email that was on the TorBox account when the vendor account was registered.` - \"vendor_status\" `the status of the vendor account. A vendor account is registered as \"pending\".` - \"users_allowed\" `the highest number of users the vendor account may have.` - \"current_users\" `the number of users currently counted against \"users_allowed\".` - \"can_register_new\" `whether the vendor account is allowed to register users.` - \"account_type\" `always \"individual\".` - \"plan\" `the plan that is given to the vendor's users.` - \"paid_until\" `the date the vendor account is paid until. It is given to the vendor's users as their \"premium_expires_at\".` - \"can_generate_vouchers\" `whether the vendor account is allowed to generate vouchers.`  ### Rate Limits  This endpoint is rate limited to **1 request per second** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getVendorAccount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->getVendorAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetVendorAccountResponse**](../Model/GetVendorAccountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVendorUser()`

```php
getVendorUser($userAuthId): \TorBox\Sdk\Model\GetVendorUserResponse
```

Get Vendor User

### Overview  Gets a single user account that is owned by your vendor account, using the user's `auth_id`. A user that is not owned by your vendor account is not found.  The response is the user's full account record, the same as an item of the Get Vendor Users endpoint, with one more key at the end:  - \"api_token\" `the user's API token. If the user has no API token, this is the text \"USER HAS NOT CONFIRMED EMAIL\".`  ### Rate Limits  This endpoint is rate limited to **1 request per second** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$userAuthId = 'userAuthId_example'; // string | Auth id of the user, from the Get Vendor Users endpoint. Required.

try {
    $result = $apiInstance->getVendorUser($userAuthId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->getVendorUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **userAuthId** | **string**| Auth id of the user, from the Get Vendor Users endpoint. Required. | |

### Return type

[**\TorBox\Sdk\Model\GetVendorUserResponse**](../Model/GetVendorUserResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVendorUsers()`

```php
getVendorUsers(): \TorBox\Sdk\Model\GetVendorUsersResponse
```

Get Vendor Users

### Overview  Gets every user account that is owned by your vendor account. Each item is the user's full account record, including their email, plan and `premium_expires_at`. There are no paging parameters, all of the users are returned in one response, ordered by their `id`. If the vendor account owns no users, `data` is an empty list.  The `auth_id` of a user is what the Get Vendor User and Remove Vendor User endpoints take as `user_auth_id`.  ### Rate Limits  This endpoint is rate limited to **1 request per second** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getVendorUsers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->getVendorUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\GetVendorUsersResponse**](../Model/GetVendorUsersResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refreshVendorUsers()`

```php
refreshVendorUsers(): \TorBox\Sdk\Model\RefreshVendorUsersResponse
```

Refresh Vendor Users

### Overview  Refreshes every user that is owned by your vendor account. Each user's plan is set to your vendor account's `plan`, and each user's `premium_expires_at` is set to your vendor account's `paid_until`. Your vendor account's `current_users` is then recounted from the users it owns.  Your vendor account must be active: approved (its status is no longer \"pending\"), on a paid plan (its `plan` is not 0) and with a `paid_until` date that has not passed. Otherwise the request is rejected and no user is changed.  This endpoint takes no parameters and returns no data.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->refreshVendorUsers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->refreshVendorUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\TorBox\Sdk\Model\RefreshVendorUsersResponse**](../Model/RefreshVendorUsersResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `registerVendor()`

```php
registerVendor($vendorName, $vendorUrl): \TorBox\Sdk\Model\RegisterVendorResponse
```

Register Vendor

### Overview  Registers a vendor account under your TorBox account. The vendor account uses your TorBox account's email, is created with the status \"pending\" and a newly generated vendor token, and your TorBox account is marked as a vendor. Once it is registered, a welcome email is sent to your account's email address and the TorBox team is notified of the signup.  A TorBox account can only have one vendor account, and an account that is itself owned by a vendor cannot register as a vendor.  The `vendor_url` must start with `http://` or `https://` and be a domain with an optional path. A URL with a port, a query string or a fragment is rejected.  To read the vendor account afterwards, including its id, user limit, plan and paid-until date, use the Get Vendor Account endpoint.  ### Rate Limits  This endpoint is rate limited to **15 requests per hour** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vendorName = 'vendorName_example'; // string | Name of the vendor. Required.
$vendorUrl = 'vendorUrl_example'; // string | Website of the vendor. Must start with http:// or https:// and cannot contain a port, a query string or a fragment. Required.

try {
    $result = $apiInstance->registerVendor($vendorName, $vendorUrl);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->registerVendor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vendorName** | **string**| Name of the vendor. Required. | |
| **vendorUrl** | **string**| Website of the vendor. Must start with http:// or https:// and cannot contain a port, a query string or a fragment. Required. | |

### Return type

[**\TorBox\Sdk\Model\RegisterVendorResponse**](../Model/RegisterVendorResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `registerVendorUser()`

```php
registerVendorUser($userEmail): \TorBox\Sdk\Model\RegisterVendorUserResponse
```

Register Vendor User

### Overview  Registers a user under your vendor account. Your vendor account must be allowed to register users (`can_register_new`) and must be below its user limit (`current_users` lower than `users_allowed`). The email is trimmed and lowercased before it is used, and it must be a valid, deliverable address that is not from a disposable email provider.  What happens depends on whether the email already has a TorBox account:  - **New account** `the email has no TorBox account. A new TorBox account is created with its email already confirmed and a generated password. It is owned by your vendor account, on your vendor account's plan, with your vendor account's \"paid_until\" as its \"premium_expires_at\". The generated password is returned in the \"password\" key.` - **Existing account** `the email already has a TorBox account that is not owned by a vendor. The account is attached to your vendor account, and its plan and \"premium_expires_at\" are replaced with your vendor account's plan and \"paid_until\". Its password is not changed, so the \"password\" key is the text \"ALREADY_SET\". The user receives a notification that they were added to your vendor account, with a link to your vendor URL.`  An existing account is attached only when the email you send is the account's own email, or is that email without its dots and without anything from a `+` on in the part before the `@`. Any other spelling of an existing account's email attaches nothing and is rejected with the error `USER_EXISTS`: the account of `jane.doe@example.com` is not attached by `jane.doe+shop@example.com`.  An account that is already owned by a vendor cannot be registered, and that includes an account your own vendor account already owns. When two vendors register the same account at the same moment, one of them gets it and the other is rejected.  Each successful registration raises your vendor account's `current_users` by one. The `auth_id` in the response is what the Get Vendor User and Remove Vendor User endpoints take as `user_auth_id`.  ### Rate Limits  This endpoint is rate limited to **1 request per second** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$userEmail = 'userEmail_example'; // string | Email address of the user to register. Required.

try {
    $result = $apiInstance->registerVendorUser($userEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->registerVendorUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **userEmail** | **string**| Email address of the user to register. Required. | |

### Return type

[**\TorBox\Sdk\Model\RegisterVendorUserResponse**](../Model/RegisterVendorUserResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeVendorUser()`

```php
removeVendorUser($userAuthId): \TorBox\Sdk\Model\RemoveVendorUserResponse
```

Remove Vendor User

### Overview  Removes a user from your vendor account. The user must be owned by your vendor account. The user's TorBox account is not deleted, it is only released from the vendor, even though the `detail` of the response reads \"User deleted successfully.\"  What happens to the user's plan depends on the plan they are on when they are removed:  - If the user is on the same plan as your vendor account, the user is moved to the free plan (plan 0) and their `premium_expires_at` is set to the current time. - If the user is on a different plan than your vendor account, their plan and their `premium_expires_at` are left as they are.  Your vendor account's `current_users` is lowered by one, and the user receives a notification that they were removed from the vendor.  ### Rate Limits  This endpoint is rate limited to **1 request per second** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$userAuthId = 'userAuthId_example'; // string | Auth id of the user to remove, from the Get Vendor Users endpoint. Required.

try {
    $result = $apiInstance->removeVendorUser($userAuthId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->removeVendorUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **userAuthId** | **string**| Auth id of the user to remove, from the Get Vendor Users endpoint. Required. | |

### Return type

[**\TorBox\Sdk\Model\RemoveVendorUserResponse**](../Model/RemoveVendorUserResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateVendorAccount()`

```php
updateVendorAccount($vendorName, $vendorUrl): \TorBox\Sdk\Model\UpdateVendorAccountResponse
```

Update Vendor Account

### Overview  Updates the name, the URL, or both, of your vendor account. Send at least one of `vendor_name` and `vendor_url`. The one that is not sent is left as it is.  The `vendor_url` follows the same rule as on the Register Vendor endpoint: it must start with `http://` or `https://` and be a domain with an optional path. A URL with a port, a query string or a fragment is rejected, and the request then changes nothing.  The response is the updated vendor account, in the same shape and with the same `detail` as the Get Vendor Account endpoint.  ### Rate Limits  This endpoint is rate limited to **15 requests per hour** per API token.  ### Authorization  Requires an API key using the Authorization Bearer Header. Works with an API key from any plan, including the free plan.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: ApiKey
$config = TorBox\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new TorBox\Sdk\Api\VendorsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vendorName = 'vendorName_example'; // string | New name of the vendor. Optional, but at least one of vendor_name and vendor_url must be sent.
$vendorUrl = 'vendorUrl_example'; // string | New website of the vendor. Must start with http:// or https:// and cannot contain a port, a query string or a fragment. Optional, but at least one of vendor_name and vendor_url must be sent.

try {
    $result = $apiInstance->updateVendorAccount($vendorName, $vendorUrl);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VendorsApi->updateVendorAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **vendorName** | **string**| New name of the vendor. Optional, but at least one of vendor_name and vendor_url must be sent. | [optional] |
| **vendorUrl** | **string**| New website of the vendor. Must start with http:// or https:// and cannot contain a port, a query string or a fragment. Optional, but at least one of vendor_name and vendor_url must be sent. | [optional] |

### Return type

[**\TorBox\Sdk\Model\UpdateVendorAccountResponse**](../Model/UpdateVendorAccountResponse.md)

### Authorization

[ApiKey](../../README.md#ApiKey)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
