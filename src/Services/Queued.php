<?php

namespace TorboxApi\Services;

use TorboxApi\Utils\Serializer;
use TorboxApi\Models;

class Queued extends BaseService
{
    /**
     * ### Overview

Retrieves all of a user's queued downloads by type. If you want to get all 3 types, "torrent", "usenet" and "webdl" then you will need to run this request 3 times, each with the different type.

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function getQueuedDownloads(
        string $apiVersion,
        string $bypassCache = null,
        string $id = null,
        string $offset = null,
        string $limit = null,
        string $type = null
    ): mixed {
        $data = $this->sendRequest('get', "/{$apiVersion}/api/queued/getqueued", [
            'query' => [
                'bypass_cache' => $bypassCache,
                'id' => $id,
                'offset' => $offset,
                'limit' => $limit,
                'type' => $type,
            ],
        ]);

        return json_decode($data, true);
    }

    /**
     * ### Overview

Controls a queued torrent. By sending the queued torrent's ID and the type of operation you want to perform, it will perform that action on the queued torrent.

Operations are either:

- **Delete** `deletes the queued download from your account`
    
- **Start** `starts a queued download, cannot be used with the "all" parameter`
    

### Authorization

Requires an API key using the Authorization Bearer Header.
     */
    public function controlQueuedDownloads(string $apiVersion, ?mixed $input = null): mixed
    {
        $data = $this->sendRequest('post', "/{$apiVersion}/api/queued/controlqueued", [
            'json' => Serializer::serialize($input),
        ]);

        return json_decode($data, true);
    }
}
