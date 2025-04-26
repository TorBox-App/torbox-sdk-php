# Queued

A list of all methods in the `Queued` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[getQueuedDownloads](#getqueueddownloads)| ### Overview Retrieves all of a user's queued downloads by type. If you want to get all 3 types, "torrent", "usenet" and "webdl" then you will need to run this request 3 times, each with the different type. ### Authorization Requires an API key using the Authorization Bearer Header. |
|[controlQueuedDownloads](#controlqueueddownloads)| ### Overview Controls a queued torrent. By sending the queued torrent's ID and the type of operation you want to perform, it will perform that action on the queued torrent. Operations are either: - **Delete** `deletes the queued download from your account`      - **Start** `starts a queued download, cannot be used with the "all" parameter`      ### Authorization Requires an API key using the Authorization Bearer Header. |

## getQueuedDownloads

### Overview Retrieves all of a user's queued downloads by type. If you want to get all 3 types, "torrent", "usenet" and "webdl" then you will need to run this request 3 times, each with the different type. ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/queued/getqueued`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| $bypassCache | string | ❌ | Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls. |
| $id | string | ❌ | Determines the queued download requested, will return an object rather than list. Optional. |
| $offset | string | ❌ | Determines the offset of items to get from the database. Default is 0. Optional. |
| $limit | string | ❌ | Determines the number of items to recieve per request. Default is 1000. Optional. |
| $type | string | ❌ | The type of the queued download you want to retrieve. Can be "torrent", "usenet" or "webdl". Optional. Default is "torrent". |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->queued->getQueuedDownloads(
  bypassCache: "boolean",
  id: "integer",
  offset: "integer",
  limit: "integer",
  type: "string",
  apiVersion: "api_version"
);

print_r($response);
```

## controlQueuedDownloads

### Overview Controls a queued torrent. By sending the queued torrent's ID and the type of operation you want to perform, it will perform that action on the queued torrent. Operations are either: - **Delete** `deletes the queued download from your account`      - **Start** `starts a queued download, cannot be used with the "all" parameter`      ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `POST`
- Endpoint: `/{api_version}/api/queued/controlqueued`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| input | mixed | ❌ | ### Overview Controls a queued torrent. By sending the queued torrent's ID and the type of operation you want to perform, it will perform that action on the queued torrent. Operations are either: - **Delete** `deletes the queued download from your account`      - **Start** `starts a queued download, cannot be used with the "all" parameter`      ### Authorization Requires an API key using the Authorization Bearer Header. |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->queued->controlQueuedDownloads(
  input: $input,
  apiVersion: "api_version"
);

print_r($response);
```


