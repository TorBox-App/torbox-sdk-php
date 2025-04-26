# Usenet

A list of all methods in the `Usenet` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[createUsenetDownload](#createusenetdownload)| ### Overview Creates a usenet download under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large. #### Post Processing Options: All post processing options that the Usenet client will perform before TorBox's own processing to make the files available. It is recommended you either don't send this parameter, or keep it at `-1` for default, which will give only the wanted files. - `-1`, Default. This runs repairs, and extractions as well as deletes the source files leaving only the wanted downloaded files.      - `0`, None. No post-processing at all. Just download all the files (including all PAR2). TorBox will still do its normal processing to make the download available, but no repairs, or extraction will take place.      - `1`, Repair. Download files and do a PAR2 verification. If the verification fails, download more PAR2 files and attempt to repair the files.      - `2`, Repair and Unpack. Download all files, do a PAR2 verification and unpack the files. The final folder will also include the RAR and ZIP files.      - `3`, Repair, Unpack and Delete. Download all files, do a PAR2 verification, unpack the files to the final folder and delete the source files.      ### Authorization Requires an API key using the Authorization Bearer Header. |
|[controlUsenetDownload](#controlusenetdownload)| ### Overview Controls a usenet download. By sending the usenet download's ID and the type of operation you want to perform, it will send that request to the usenet client. Operations are either: - **Delete** `deletes the nzb from the client and your account permanently`      - **Pause** `pauses a nzb's download`      - **Resume** `resumes a paused usenet download`      ### Authorization Requires an API key using the Authorization Bearer Header. |
|[requestDownloadLink1](#requestdownloadlink1)| ### Overview Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing. ### Permalinks Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard. ### Authorization Requires an API key as a parameter for the `token` parameter. |
|[getUsenetList](#getusenetlist)| ### Overview Gets the user's usenet download list. This gives you the needed information to perform other usenet actions. Unlike Torrents, this information is updated on its own every 5 seconds for live usenet downloads. ### Authorization Requires an API key using the Authorization Bearer Header. |
|[getUsenetCachedAvailability](#getusenetcachedavailability)| ### Overview Takes in a list of comma separated usenet hashes and checks if the usenet download is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as:   `?hash=XXXX&hash=XXXX&hash=XXXX` or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX`   and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour. You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below. To get the hash of a usenet download, pass the link or file through an md5 hash algo and it will return the proper hash for it. ### Authorization Requires an API key using the Authorization Bearer Header. |

## createUsenetDownload

### Overview Creates a usenet download under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large. #### Post Processing Options: All post processing options that the Usenet client will perform before TorBox's own processing to make the files available. It is recommended you either don't send this parameter, or keep it at `-1` for default, which will give only the wanted files. - `-1`, Default. This runs repairs, and extractions as well as deletes the source files leaving only the wanted downloaded files.      - `0`, None. No post-processing at all. Just download all the files (including all PAR2). TorBox will still do its normal processing to make the download available, but no repairs, or extraction will take place.      - `1`, Repair. Download files and do a PAR2 verification. If the verification fails, download more PAR2 files and attempt to repair the files.      - `2`, Repair and Unpack. Download all files, do a PAR2 verification and unpack the files. The final folder will also include the RAR and ZIP files.      - `3`, Repair, Unpack and Delete. Download all files, do a PAR2 verification, unpack the files to the final folder and delete the source files.      ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `POST`
- Endpoint: `/{api_version}/api/usenet/createusenetdownload`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| input | Models\CreateUsenetDownloadRequest | ❌ | ### Overview Creates a usenet download under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large. #### Post Processing Options: All post processing options that the Usenet client will perform before TorBox's own processing to make the files available. It is recommended you either don't send this parameter, or keep it at `-1` for default, which will give only the wanted files. - `-1`, Default. This runs repairs, and extractions as well as deletes the source files leaving only the wanted downloaded files.      - `0`, None. No post-processing at all. Just download all the files (including all PAR2). TorBox will still do its normal processing to make the download available, but no repairs, or extraction will take place.      - `1`, Repair. Download files and do a PAR2 verification. If the verification fails, download more PAR2 files and attempt to repair the files.      - `2`, Repair and Unpack. Download all files, do a PAR2 verification and unpack the files. The final folder will also include the RAR and ZIP files.      - `3`, Repair, Unpack and Delete. Download all files, do a PAR2 verification, unpack the files to the final folder and delete the source files.      ### Authorization Requires an API key using the Authorization Bearer Header. |

**Return Type**

`Models\CreateUsenetDownloadOkResponse`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;
use TorboxApi\Models\CreateUsenetDownloadRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateUsenetDownloadRequest(
  file: file,
  link: "link"
);

$response = $sdk->usenet->createUsenetDownload(
  input: $input,
  apiVersion: "api_version"
);

print_r($response);
```

## controlUsenetDownload

### Overview Controls a usenet download. By sending the usenet download's ID and the type of operation you want to perform, it will send that request to the usenet client. Operations are either: - **Delete** `deletes the nzb from the client and your account permanently`      - **Pause** `pauses a nzb's download`      - **Resume** `resumes a paused usenet download`      ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `POST`
- Endpoint: `/{api_version}/api/usenet/controlusenetdownload`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| input | mixed | ❌ | ### Overview Controls a usenet download. By sending the usenet download's ID and the type of operation you want to perform, it will send that request to the usenet client. Operations are either: - **Delete** `deletes the nzb from the client and your account permanently`      - **Pause** `pauses a nzb's download`      - **Resume** `resumes a paused usenet download`      ### Authorization Requires an API key using the Authorization Bearer Header. |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->usenet->controlUsenetDownload(
  input: $input,
  apiVersion: "api_version"
);

print_r($response);
```

## requestDownloadLink1

### Overview Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing. ### Permalinks Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard. ### Authorization Requires an API key as a parameter for the `token` parameter.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/usenet/requestdl`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| $token | string | ❌ | Your API Key |
| $usenetId | string | ❌ | The usenet download's ID that you want to download |
| $fileId | string | ❌ | The files's ID that you want to download |
| $zipLink | string | ❌ | If you want a zip link. Required if no file_id. Takes precedence over file_id if both are given. |
| $userIp | string | ❌ | The user's IP to determine the closest CDN. Optional. |
| $redirect | string | ❌ | If you want to redirect the user to the CDN link. This is useful for creating permalinks so that you can just make this request URL the link. |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->usenet->requestDownloadLink1(
  token: "{{api_key}}",
  usenetId: "{{usenet_id}}",
  fileId: "{{usenet_file_id}}",
  zipLink: "boolean",
  userIp: "string",
  redirect: "boolean",
  apiVersion: "api_version"
);

print_r($response);
```

## getUsenetList

### Overview Gets the user's usenet download list. This gives you the needed information to perform other usenet actions. Unlike Torrents, this information is updated on its own every 5 seconds for live usenet downloads. ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/usenet/mylist`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| $bypassCache | string | ❌ | Allows you to bypass the cached data, and always get fresh information. Useful if constantly querying for fresh download stats. Otherwise, we request that you save our database a few calls. |
| $id | string | ❌ | Determines the usenet download requested, will return an object rather than list. Optional. |
| $offset | string | ❌ | Determines the offset of items to get from the database. Default is 0. Optional. |
| $limit | string | ❌ | Determines the number of items to recieve per request. Default is 1000. Optional. |

**Return Type**

`Models\GetUsenetListOkResponse`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->usenet->getUsenetList(
  bypassCache: "boolean",
  id: "integer",
  offset: "integer",
  limit: "integer",
  apiVersion: "api_version"
);

print_r($response);
```

## getUsenetCachedAvailability

### Overview Takes in a list of comma separated usenet hashes and checks if the usenet download is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as:   `?hash=XXXX&hash=XXXX&hash=XXXX` or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX`   and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour. You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below. To get the hash of a usenet download, pass the link or file through an md5 hash algo and it will return the proper hash for it. ### Authorization Requires an API key using the Authorization Bearer Header.


- HTTP Method: `GET`
- Endpoint: `/{api_version}/api/usenet/checkcached`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $apiVersion | string | ✅ |  |
| $hash | string | ❌ | The list of usenet hashes you want to check. Comma seperated. To find the hash, md5 the link of the usenet link or file. |
| $format | string | ❌ | Format you want the data in. Acceptable is either "object" or "list". List is the most performant option as it doesn't require modification of the list. |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use TorboxApi\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->usenet->getUsenetCachedAvailability(
  hash: "{{usenet_hash}}",
  format: "object",
  apiVersion: "api_version"
);

print_r($response);
```


