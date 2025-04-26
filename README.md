![Logo](https://raw.githubusercontent.com/TorBox-App/torbox-sdk-php/main/assets/banner.png)

## Table of Contents
- [Setup & Configuration](#setup--configuration)
	- [Supported Language Versions](#supported-language-versions)
	- [Installation](#installation)
- [Authentication](#authentication)
	- [Access Token Authentication](#access-token-authentication)
- [Setting a Custom Timeout](#setting-a-custom-timeout)
- [Sample Usage](#sample-usage)
- [Services](#services)
- [Models](#models)
- [License](#license)

## Setup & Configuration

### Supported Language Versions

This SDK is compatible with the following versions: `PHP >= 8.0`

### Installation

To get started with the SDK, we recommend installing using `composer`:

```bash
composer require torbox/sdk
```

## Authentication

### Access Token Authentication
The torbox-api API uses an Access Token for authentication.

This token must be provided to authenticate your requests to the API.

#### Setting the Access Token

When you initialize the SDK, you can set the access token as follows:

```php
new Client(accessToken: "YOUR_ACCESS_TOKEN");
```

If you need to set or update the access token after initializing the SDK, you can use:

```php
sdk.setAccessToken("YOUR_ACCESS_TOKEN")
```




## Setting a Custom Timeout

You can set a custom timeout for the SDK's HTTP requests as follows:

```php
$sdk = new Client(timeout: 1000);
```

# Sample Usage

Below is a comprehensive example demonstrating how to authenticate and call a simple endpoint:

```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getUpStatus();

print_r($response);

```

## Services

The SDK provides various services to interact with the API.

<details> 
<summary>Below is a list of all available services with links to their detailed documentation:</summary>

| Name |
| :--- |
| [Torrents](documentation/services/Torrents.md) |
| [Usenet](documentation/services/Usenet.md) |
| [WebDownloadsDebrid](documentation/services/WebDownloadsDebrid.md) |
| [General](documentation/services/General.md) |
| [Notifications](documentation/services/Notifications.md) |
| [User](documentation/services/User.md) |
| [RssFeeds](documentation/services/RssFeeds.md) |
| [Integrations](documentation/services/Integrations.md) |
| [Queued](documentation/services/Queued.md) |
</details>

## Models

The SDK includes several models that represent the data structures used in API requests and responses. These models help in organizing and managing the data efficiently.

<details> 
<summary>Below is a list of all available models with links to their detailed documentation:</summary>

| Name       | Description |
| :--------- | :---------- |
| [CreateTorrentRequest](documentation/models/CreateTorrentRequest.md) |  |
| [CreateTorrentOkResponse](documentation/models/CreateTorrentOkResponse.md) |  |
| [ControlTorrentOkResponse](documentation/models/ControlTorrentOkResponse.md) |  |
| [RequestDownloadLinkOkResponse](documentation/models/RequestDownloadLinkOkResponse.md) |  |
| [GetTorrentListOkResponse](documentation/models/GetTorrentListOkResponse.md) |  |
| [GetTorrentCachedAvailabilityOkResponse](documentation/models/GetTorrentCachedAvailabilityOkResponse.md) |  |
| [ExportTorrentDataOkResponse](documentation/models/ExportTorrentDataOkResponse.md) |  |
| [GetTorrentInfoOkResponse](documentation/models/GetTorrentInfoOkResponse.md) |  |
| [GetTorrentInfo1Request](documentation/models/GetTorrentInfo1Request.md) |  |
| [GetTorrentInfo1OkResponse](documentation/models/GetTorrentInfo1OkResponse.md) |  |
| [CreateUsenetDownloadRequest](documentation/models/CreateUsenetDownloadRequest.md) |  |
| [CreateUsenetDownloadOkResponse](documentation/models/CreateUsenetDownloadOkResponse.md) |  |
| [GetUsenetListOkResponse](documentation/models/GetUsenetListOkResponse.md) |  |
| [CreateWebDownloadRequest](documentation/models/CreateWebDownloadRequest.md) |  |
| [CreateWebDownloadOkResponse](documentation/models/CreateWebDownloadOkResponse.md) |  |
| [GetWebDownloadListOkResponse](documentation/models/GetWebDownloadListOkResponse.md) |  |
| [GetHosterListOkResponse](documentation/models/GetHosterListOkResponse.md) |  |
| [GetUpStatusOkResponse](documentation/models/GetUpStatusOkResponse.md) |  |
| [GetStatsOkResponse](documentation/models/GetStatsOkResponse.md) |  |
| [GetChangelogsJsonOkResponse](documentation/models/GetChangelogsJsonOkResponse.md) |  |
| [GetNotificationFeedOkResponse](documentation/models/GetNotificationFeedOkResponse.md) |  |
| [GetUserDataOkResponse](documentation/models/GetUserDataOkResponse.md) |  |
| [AddReferralToAccountOkResponse](documentation/models/AddReferralToAccountOkResponse.md) |  |
| [GetAllJobsOkResponse](documentation/models/GetAllJobsOkResponse.md) |  |
| [GetAllJobsByHashOkResponse](documentation/models/GetAllJobsByHashOkResponse.md) |  |
| [CreateTorrentOkResponseData](documentation/models/CreateTorrentOkResponseData.md) |  |
| [GetTorrentListOkResponseData](documentation/models/GetTorrentListOkResponseData.md) |  |
| [DataFiles_1](documentation/models/DataFiles1.md) |  |
| [GetTorrentCachedAvailabilityOkResponseData](documentation/models/GetTorrentCachedAvailabilityOkResponseData.md) |  |
| [GetTorrentInfoOkResponseData](documentation/models/GetTorrentInfoOkResponseData.md) |  |
| [DataFiles_2](documentation/models/DataFiles2.md) |  |
| [GetTorrentInfo1OkResponseData](documentation/models/GetTorrentInfo1OkResponseData.md) |  |
| [DataFiles_3](documentation/models/DataFiles3.md) |  |
| [CreateUsenetDownloadOkResponseData](documentation/models/CreateUsenetDownloadOkResponseData.md) |  |
| [GetUsenetListOkResponseData](documentation/models/GetUsenetListOkResponseData.md) |  |
| [DataFiles_4](documentation/models/DataFiles4.md) |  |
| [CreateWebDownloadOkResponseData](documentation/models/CreateWebDownloadOkResponseData.md) |  |
| [GetWebDownloadListOkResponseData](documentation/models/GetWebDownloadListOkResponseData.md) |  |
| [DataFiles_5](documentation/models/DataFiles5.md) |  |
| [GetHosterListOkResponseData](documentation/models/GetHosterListOkResponseData.md) |  |
| [GetStatsOkResponseData](documentation/models/GetStatsOkResponseData.md) |  |
| [GetChangelogsJsonOkResponseData](documentation/models/GetChangelogsJsonOkResponseData.md) |  |
| [GetNotificationFeedOkResponseData](documentation/models/GetNotificationFeedOkResponseData.md) |  |
| [GetUserDataOkResponseData](documentation/models/GetUserDataOkResponseData.md) |  |
| [Settings](documentation/models/Settings.md) |  |
| [GetAllJobsOkResponseData](documentation/models/GetAllJobsOkResponseData.md) |  |
| [GetAllJobsByHashOkResponseData](documentation/models/GetAllJobsByHashOkResponseData.md) |  |
</details>

## License

This SDK is licensed under the MIT License.

See the [LICENSE](LICENSE) file for more details.