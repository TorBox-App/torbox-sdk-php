<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetStatsOkResponseData
{
    #[SerializedName('active_torrents')]
    public ?float $activeTorrents;

    #[SerializedName('active_usenet_downloads')]
    public ?float $activeUsenetDownloads;

    #[SerializedName('active_web_downloads')]
    public ?float $activeWebDownloads;

    #[SerializedName('total_bytes_downloaded')]
    public ?float $totalBytesDownloaded;

    #[SerializedName('total_bytes_uploaded')]
    public ?float $totalBytesUploaded;

    #[SerializedName('total_downloads')]
    public ?float $totalDownloads;

    #[SerializedName('total_servers')]
    public ?float $totalServers;

    #[SerializedName('total_torrent_downloads')]
    public ?float $totalTorrentDownloads;

    #[SerializedName('total_usenet_downloads')]
    public ?float $totalUsenetDownloads;

    #[SerializedName('total_users')]
    public ?float $totalUsers;

    #[SerializedName('total_web_downloads')]
    public ?float $totalWebDownloads;

    public function __construct(
        ?float $activeTorrents = null,
        ?float $activeUsenetDownloads = null,
        ?float $activeWebDownloads = null,
        ?float $totalBytesDownloaded = null,
        ?float $totalBytesUploaded = null,
        ?float $totalDownloads = null,
        ?float $totalServers = null,
        ?float $totalTorrentDownloads = null,
        ?float $totalUsenetDownloads = null,
        ?float $totalUsers = null,
        ?float $totalWebDownloads = null
    ) {
        $this->activeTorrents = $activeTorrents;
        $this->activeUsenetDownloads = $activeUsenetDownloads;
        $this->activeWebDownloads = $activeWebDownloads;
        $this->totalBytesDownloaded = $totalBytesDownloaded;
        $this->totalBytesUploaded = $totalBytesUploaded;
        $this->totalDownloads = $totalDownloads;
        $this->totalServers = $totalServers;
        $this->totalTorrentDownloads = $totalTorrentDownloads;
        $this->totalUsenetDownloads = $totalUsenetDownloads;
        $this->totalUsers = $totalUsers;
        $this->totalWebDownloads = $totalWebDownloads;
    }
}
