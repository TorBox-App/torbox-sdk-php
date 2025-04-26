<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class Torrents extends BaseService
{
    /**
     * ### Overview

Creates a torrent under your account. Simply send **either** a magnet link, or a torrent file. Once they have been checked, they will begin downloading assuming your account has available active download slots, and they aren't too large.  
  

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function createTorrent(
        string $apiVersion,
        ?Models\CreateTorrentRequest $input = null
    ): Models\CreateTorrentOkResponse {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/torrents/createtorrent", [
            'multipart' => $input->toMultipart(),
        ]);

        return Serializer::deserialize($data, Models\CreateTorrentOkResponse::class);
    }

    /**
     * ### Overview

Controls a torrent. By sending the torrent's ID and the type of operation you want to perform, it will send that request to the torrent client.

Operations are either:

- **Reannounce** `reannounces the torrent to get new peers`
    
- **Delete** `deletes the torrent from the client and your account permanently`
    
- **Resume** `resumes a paused torrent`
    

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function controlTorrent(string $apiVersion, ?mixed $input = null): Models\ControlTorrentOkResponse
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/torrents/controltorrent", [
            'json' => Serializer::serialize($input),
        ]);

        return Serializer::deserialize($data, Models\ControlTorrentOkResponse::class);
    }

    /**
     * ### Overview

Requests the download link from the server. Because downloads are metered, TorBox cannot afford to allow free access to the links directly. This endpoint opens the link for 3 hours for downloads. Once a download is started, the user has nearly unlilimited time to download the file. The 1 hour time limit is simply for starting downloads. This prevents long term link sharing.

### Permalinks

Instead of generating many CDN urls by requesting this endpoint, you can instead create a permalink such as: `https://api.torbox.app/v1/api/torrents/requestdl?token=APIKEY&torrent_id=NUMBER&file_id=NUMBER&redirect=true` and when a user clicks on it, it will automatically redirect them to the CDN link. This saves requests and doesn't abuse the API. Use this method rather than saving CDN links as they are not permanent. To invalidate these permalinks, simply reset your API token or delete the item from your dashboard.

### Authorization

Requires an API key as a parameter for the `token` parameter.
     */
    public function requestDownloadLink(
        string $apiVersion,
        string $token = null,
        string $torrentId = null,
        string $fileId = null,
        string $zipLink = null,
        string $userIp = null,
        string $redirect = null
    ): Models\RequestDownloadLinkOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/torrents/requestdl", [
            'query' => [
                'token' => $token,
                'torrent_id' => $torrentId,
                'file_id' => $fileId,
                'zip_link' => $zipLink,
                'user_ip' => $userIp,
                'redirect' => $redirect,
            ],
        ]);

        return Serializer::deserialize($data, Models\RequestDownloadLinkOkResponse::class);
    }

    /**
     * ### Overview

Gets the user's torrent list. This gives you the needed information to perform other torrent actions. This information only gets updated every 600 seconds, or when the _Request Update On Torrent_ request is sent to the _relay API_.

#### Download States:

- "downloading" -> The torrent is currently downloading.
    
- "uploading" -> The torrent is currently seeding.
    
- "stalled (no seeds)" -> The torrent is trying to download, but there are no seeds connected to download from.
    
- "paused" -> The torrent is paused.
    
- "completed" -> The torrent is completely downloaded. Do not use this for download completion status.
    
- "cached" -> The torrent is cached from the server.
    
- "metaDL" -> The torrent is downloading metadata from the hoard.
    
- "checkingResumeData" -> The torrent is checking resumable data.
    

All other statuses are basic qBittorrent states. [Check out here for the full list](https://github.com/qbittorrent/qBittorrent/wiki/WebUI-API-(qBittorrent-4.1)#torrent-management).

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getTorrentList(
        string $apiVersion,
        string $bypassCache = null,
        string $id = null,
        string $offset = null,
        string $limit = null
    ): Models\GetTorrentListOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/torrents/mylist", [
            'query' => [
                'bypass_cache' => $bypassCache,
                'id' => $id,
                'offset' => $offset,
                'limit' => $limit,
            ],
        ]);

        return Serializer::deserialize($data, Models\GetTorrentListOkResponse::class);
    }

    /**
     * ### Overview

Takes in a list of comma separated torrent hashes and checks if the torrent is cached. This endpoint only gets a max of around 100 at a time, due to http limits in queries. If you want to do more, you can simply do more hash queries. Such as:  
`?hash=XXXX&hash=XXXX&hash=XXXX`

or `?hash=XXXX,XXXX&hash=XXXX&hash=XXXX,XXXX`  
and this will work too. Performance is very fast. Less than 1 second per 100. Time is approximately O(log n) time for those interested in taking it to its max. That is without caching as well. This endpoint stores a cache for an hour.

You may also pass a `format` parameter with the format you want the data in. Options are either `object` or `list`. You can view examples of both below.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getTorrentCachedAvailability(
        string $apiVersion,
        string $hash = null,
        string $format = null,
        string $listFiles = null
    ): Models\GetTorrentCachedAvailabilityOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/torrents/checkcached", [
            'query' => [
                'hash' => $hash,
                'format' => $format,
                'list_files' => $listFiles,
            ],
        ]);

        return Serializer::deserialize($data, Models\GetTorrentCachedAvailabilityOkResponse::class);
    }

    /**
     * ### Overview

Exports the magnet or torrent file. Requires a type to be passed. If type is **magnet**, it will return a JSON response with the magnet as a string in the _data_ key. If type is **file**, it will return a bittorrent file as a download. Not compatible with cached downloads.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function exportTorrentData(
        string $apiVersion,
        string $torrentId = null,
        string $type = null
    ): Models\ExportTorrentDataOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/torrents/exportdata", [
            'query' => [
                'torrent_id' => $torrentId,
                'type' => $type,
            ],
        ]);

        return Serializer::deserialize($data, Models\ExportTorrentDataOkResponse::class);
    }

    /**
     * ### Overview

A general route that allows you to give a hash, and TorBox will return data about the torrent. This data is retrieved from the Bittorrent network, so expect it to take some time. If the request goes longer than 10 seconds, TorBox will cancel it. You can adjust this if you like, but the default is 10 seconds. This route is cached as well, so subsequent requests will be instant.

### Authorization

None required.
     */
    public function getTorrentInfo(
        string $apiVersion,
        string $hash = null,
        string $timeout = null
    ): Models\GetTorrentInfoOkResponse {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/torrents/torrentinfo", [
            'query' => [
                'hash' => $hash,
                'timeout' => $timeout,
            ],
        ]);

        return Serializer::deserialize($data, Models\GetTorrentInfoOkResponse::class);
    }

    /**
     * ### Overview

Same as the GET route, but allows posting data such as magnet, and torrent files.

Hashes will have precedence over magnets, and magnets will have precedence over torrent files.

Only proper torrent files are accepted.

At least one of hash, magnet, or torrent file is required.

A general route that allows you to give a hash, and TorBox will return data about the torrent. This data is retrieved from the Bittorrent network, so expect it to take some time. If the request goes longer than 10 seconds, TorBox will cancel it. You can adjust this if you like, but the default is 10 seconds. This route is cached as well, so subsequent requests will be instant.

### Authorization

None required.
     */
    public function getTorrentInfo1(
        string $apiVersion,
        ?Models\GetTorrentInfo1Request $input = null
    ): Models\GetTorrentInfo1OkResponse {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/torrents/torrentinfo", ['multipart' => $input]);

        return Serializer::deserialize($data, Models\GetTorrentInfo1OkResponse::class);
    }
}
