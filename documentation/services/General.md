# General

A list of all methods in the `General` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[getUpStatus](#getupstatus)| ### Overview Simply gets if the TorBox API is available for use or not. Also might include information about downtimes. ### Authorization None needed. |
|[getStats](#getstats)| ### Overview Simply gets general stats about the TorBox service. ### Authorization None needed. |
|[getChangelogsRssFeed](#getchangelogsrssfeed)| ### Overview Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for people who want updates on the TorBox changelog. Includes all the necessary items to make this compatible with RSS feed viewers for notifications, and proper HTML viewing. ### Authorization None needed. |
|[getChangelogsJson](#getchangelogsjson)| ### Overview Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for developers who want to integrate the changelog into their apps for their users to see. Includes content in HTML and markdown for developers to easily render the text in a fancy yet simple way. ### Authorization None needed. |
|[getSpeedtestFiles](#getspeedtestfiles)| ### Overview Gets CDN speedtest files. This can be used for speedtesting TorBox for users or other usages, such as checking download speeds for verification. Provides all necessary data such as region, server name, and even coordinates. Uses the requesting IP to determine if the server is the closest to the user.      You also have the ability to choose between long tests or short tests via the "test_length" parameter. You may also force the region selection by passing the "region" as a specific region. ### Authorization None needed. |

## getUpStatus

### Overview Simply gets if the TorBox API is available for use or not. Also might include information about downtimes. ### Authorization None needed.


- HTTP Method: `GET`
- Endpoint: `/`


**Return Type**

`Models\GetUpStatusOkResponse`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getUpStatus();

print_r($response);
```

## getStats

### Overview Simply gets general stats about the TorBox service. ### Authorization None needed.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/stats`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |

**Return Type**

`Models\GetStatsOkResponse`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getStats(
  apiVersion: "api_version"
);

print_r($response);
```

## getChangelogsRssFeed

### Overview Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for people who want updates on the TorBox changelog. Includes all the necessary items to make this compatible with RSS feed viewers for notifications, and proper HTML viewing. ### Authorization None needed.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/changelogs/rss`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getChangelogsRssFeed(
  apiVersion: "api_version"
);

print_r($response);
```

## getChangelogsJson

### Overview Gets most recent 100 changelogs from [https://feedback.torbox.app/changelog.](https://feedback.torbox.app/changelog.) This is useful for developers who want to integrate the changelog into their apps for their users to see. Includes content in HTML and markdown for developers to easily render the text in a fancy yet simple way. ### Authorization None needed.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/changelogs/json`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |

**Return Type**

`Models\GetChangelogsJsonOkResponse`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getChangelogsJson(
  apiVersion: "api_version"
);

print_r($response);
```

## getSpeedtestFiles

### Overview Gets CDN speedtest files. This can be used for speedtesting TorBox for users or other usages, such as checking download speeds for verification. Provides all necessary data such as region, server name, and even coordinates. Uses the requesting IP to determine if the server is the closest to the user.      You also have the ability to choose between long tests or short tests via the "test_length" parameter. You may also force the region selection by passing the "region" as a specific region. ### Authorization None needed.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/speedtest`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| $testLength | string | ❌ | Determines the size of the file used for the speedtest. May be "long" or "short". Optional. |
| $region | string | ❌ | Determines what cdns are returned. May be any region that TorBox is located in. To get this value, send a request without this value to determine all of the available regions that are available. |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->general->getSpeedtestFiles(
  testLength: "string",
  region: "string",
  apiVersion: "api_version"
);

print_r($response);
```


