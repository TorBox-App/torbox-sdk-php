<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetTorrentListOkResponseData
{
    #[SerializedName('active')]
    public ?bool $active;

    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('availability')]
    public ?float $availability;

    #[SerializedName('created_at')]
    public ?string $createdAt;

    #[SerializedName('download_finished')]
    public ?bool $downloadFinished;

    #[SerializedName('download_present')]
    public ?bool $downloadPresent;

    #[SerializedName('download_speed')]
    public ?float $downloadSpeed;

    #[SerializedName('download_state')]
    public ?string $downloadState;

    #[SerializedName('eta')]
    public ?float $eta;

    #[SerializedName('expires_at')]
    public ?string $expiresAt;

    /**
     * @var DataFiles1[]|null
     */
    #[SerializedName('files')]
    public ?array $files;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('inactive_check')]
    public ?float $inactiveCheck;

    #[SerializedName('magnet')]
    public ?string $magnet;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('peers')]
    public ?float $peers;

    #[SerializedName('progress')]
    public ?float $progress;

    #[SerializedName('ratio')]
    public ?float $ratio;

    #[SerializedName('seeds')]
    public ?float $seeds;

    #[SerializedName('server')]
    public ?float $server;

    #[SerializedName('size')]
    public ?float $size;

    #[SerializedName('torrent_file')]
    public ?bool $torrentFile;

    #[SerializedName('updated_at')]
    public ?string $updatedAt;

    #[SerializedName('upload_speed')]
    public ?float $uploadSpeed;

    public function __construct(
        ?bool $active = null,
        ?string $authId = null,
        ?float $availability = null,
        ?string $createdAt = null,
        ?bool $downloadFinished = null,
        ?bool $downloadPresent = null,
        ?float $downloadSpeed = null,
        ?string $downloadState = null,
        ?float $eta = null,
        ?string $expiresAt = null,
        ?array $files = [],
        ?string $hash = null,
        ?float $id = null,
        ?float $inactiveCheck = null,
        ?string $magnet = null,
        ?string $name = null,
        ?float $peers = null,
        ?float $progress = null,
        ?float $ratio = null,
        ?float $seeds = null,
        ?float $server = null,
        ?float $size = null,
        ?bool $torrentFile = null,
        ?string $updatedAt = null,
        ?float $uploadSpeed = null
    ) {
        $this->active = $active;
        $this->authId = $authId;
        $this->availability = $availability;
        $this->createdAt = $createdAt;
        $this->downloadFinished = $downloadFinished;
        $this->downloadPresent = $downloadPresent;
        $this->downloadSpeed = $downloadSpeed;
        $this->downloadState = $downloadState;
        $this->eta = $eta;
        $this->expiresAt = $expiresAt;
        $this->files = $files;
        $this->hash = $hash;
        $this->id = $id;
        $this->inactiveCheck = $inactiveCheck;
        $this->magnet = $magnet;
        $this->name = $name;
        $this->peers = $peers;
        $this->progress = $progress;
        $this->ratio = $ratio;
        $this->seeds = $seeds;
        $this->server = $server;
        $this->size = $size;
        $this->torrentFile = $torrentFile;
        $this->updatedAt = $updatedAt;
        $this->uploadSpeed = $uploadSpeed;
    }
}
