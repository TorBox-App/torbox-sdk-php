<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetTorrentInfo1Request
{
    /**
     * Hash of the torrent you want to get info for. This is required.
     */
    #[SerializedName('hash')]
    public ?string $hash;

    public function __construct(?string $hash = null)
    {
        $this->hash = $hash;
    }
}
