<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetTorrentCachedAvailabilityOkResponseData
{
    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('size')]
    public ?float $size;

    #[SerializedName('hash')]
    public ?string $hash;

    public function __construct(?string $name = null, ?float $size = null, ?string $hash = null)
    {
        $this->name = $name;
        $this->size = $size;
        $this->hash = $hash;
    }
}
