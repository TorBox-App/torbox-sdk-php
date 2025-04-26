<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class Usenet extends BaseService
{
    /**
     * ### Overview

Creates a usenet download under your account. Simply send **either** a link, or an nzb file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large.

#### Post Processing Options:

All post processing options that the Usenet client will perform before TorBox's own processing to make the files available. It is recommended you either don't send this parameter, or keep it at `-1` for default, which will give only the wanted files.

- `-1`, Default. This runs repairs, and extractions as well as deletes the source files leaving only the wanted downloaded files.
    
- `0`, None. No post-processing at all. Just download all the files (including all PAR2). TorBox will still do its normal processing to make the download available, but no repairs, or extraction will take place.
    
- `1`, Repair. Download files and do a PAR2 verification. If the verification fails, download more PAR2 files and attempt to repair the files.
    
- `2`, Repair and Unpack. Download all files, do a PAR2 verification and unpack the files. The final folder will also include the RAR and ZIP files.
    
- `3`, Repair, Unpack and Delete. Download all files, do a PAR2 verification, unpack the files to the final folder and delete the source files.
    

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function createUsenetDownload(
        string $apiVersion,
        ?Models\CreateUsenetDownloadRequest $input = null
    ): Models\CreateUsenetDownloadOkResponse {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/usenet/createusenetdownload", [
            'multipart' => $input->toMultipart(),
        ]);

        return Serializer::deserialize($data, Models\CreateUsenetDownloadOkResponse::class);
    }

    /**
     * ### Overview

Controls a usenet download. By sending the usenet download's ID and the type of operation you want to perform, it will send that request to the usenet client.

Operations are either:

- **Delete** `deletes the nzb from the client and your account permanently`
    
- **Pause** `pauses a nzb's download`
    
- **Resume** `resumes a paused usenet download`
    

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function controlUsenetDownload(string $apiVersion, ?mixed $input = null): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/usenet/controlusenetdownload", [
            'json' => Serializer::serialize($input),
        ]);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.

### Permalinks

Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard.

### Authorization

Requires an API key as a parameter for the `token` parameter.
     */
    public function requestDownloadLink1(
        string $apiVersion,
        string $token = null,
        string $usenetId = null,
        string $fileId = null,
        string $zipLink = null,
        string $userIp = null,
        string $redirect = null
    ): mixed {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/usenet/requestdl", [
            'query' => [
                'token' => $token,
                'usenet_id' => $usenetId,
                'file_id' => $fileId,
                'zip_link' => $zipLink,
                'user_ip' => $userIp,
                'redirect' => $redirect,
            ],
        ]);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Gets the user's usenet download list. This gives you the needed information to perform other usenet actions. Unlike Torrents, this information is updated on its own every 5 seconds for live usenet downloads.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getUsenetList(
        string $apiVersion,
        string $bypassCache = null,
        string $id = null,
        string $offset = null,
        string $limit = null
    ): Models\GetUsenetListOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/usenet/mylist", [
            'query' => [
                'bypass_cache' => $bypassCache,
                'id' => $id,
                'offset' => $offset,
                'limit' => $limit,
            ],
        ]);

        return Serializer::deserialize($data, Models\GetUsenetListOkResponse::class);
    }

    /**
     * ### Overview

Takes in a list of comma separated usenet hashes and checks if the usenet download is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as:  
`?hash=XXXX&hash=XXXX&hash=XXXX`

or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX`  
and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.

You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.

To get the hash of a usenet download, pass the link or file through an md5 hash algo and it will return the proper hash for it.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getUsenetCachedAvailability(string $apiVersion, string $hash = null, string $format = null): mixed
    {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/usenet/checkcached", [
            'query' => [
                'hash' => $hash,
                'format' => $format,
            ],
        ]);

        return json_decode($data, true);
    }
}
