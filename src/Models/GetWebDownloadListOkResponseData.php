<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetWebDownloadListOkResponseData
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

    #[SerializedName('error')]
    public ?string $error;

    #[SerializedName('eta')]
    public ?float $eta;

    #[SerializedName('expires_at')]
    public ?string $expiresAt;

    /**
     * @var DataFiles5[]|null
     */
    #[SerializedName('files')]
    public ?array $files;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('inactive_check')]
    public ?float $inactiveCheck;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('progress')]
    public ?float $progress;

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
        ?string $error = null,
        ?float $eta = null,
        ?string $expiresAt = null,
        ?array $files = [],
        ?string $hash = null,
        ?float $id = null,
        ?float $inactiveCheck = null,
        ?string $name = null,
        ?float $progress = null,
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
        $this->error = $error;
        $this->eta = $eta;
        $this->expiresAt = $expiresAt;
        $this->files = $files;
        $this->hash = $hash;
        $this->id = $id;
        $this->inactiveCheck = $inactiveCheck;
        $this->name = $name;
        $this->progress = $progress;
        $this->server = $server;
        $this->size = $size;
        $this->torrentFile = $torrentFile;
        $this->updatedAt = $updatedAt;
        $this->uploadSpeed = $uploadSpeed;
    }
}
