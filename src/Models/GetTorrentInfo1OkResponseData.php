<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetTorrentInfo1OkResponseData
{
    /**
     * @var DataFiles3[]|null
     */
    #[SerializedName('files')]
    public ?array $files;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('peers')]
    public ?float $peers;

    #[SerializedName('seeds')]
    public ?float $seeds;

    #[SerializedName('size')]
    public ?float $size;

    /**
     * @var mixed[]|null
     */
    #[SerializedName('trackers')]
    public ?array $trackers;

    public function __construct(
        ?array $files = [],
        ?string $hash = null,
        ?string $name = null,
        ?float $peers = null,
        ?float $seeds = null,
        ?float $size = null,
        ?array $trackers = []
    ) {
        $this->files = $files;
        $this->hash = $hash;
        $this->name = $name;
        $this->peers = $peers;
        $this->seeds = $seeds;
        $this->size = $size;
        $this->trackers = $trackers;
    }
}
