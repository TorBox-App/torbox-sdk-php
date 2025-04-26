<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateTorrentOkResponseData
{
    #[SerializedName('active_limit')]
    public ?float $activeLimit;

    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('current_active_downloads')]
    public ?float $currentActiveDownloads;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('queued_id')]
    public ?float $queuedId;

    #[SerializedName('torrent_id')]
    public ?float $torrentId;

    public function __construct(
        ?float $activeLimit = null,
        ?string $authId = null,
        ?float $currentActiveDownloads = null,
        ?string $hash = null,
        ?float $queuedId = null,
        ?float $torrentId = null
    ) {
        $this->activeLimit = $activeLimit;
        $this->authId = $authId;
        $this->currentActiveDownloads = $currentActiveDownloads;
        $this->hash = $hash;
        $this->queuedId = $queuedId;
        $this->torrentId = $torrentId;
    }
}
