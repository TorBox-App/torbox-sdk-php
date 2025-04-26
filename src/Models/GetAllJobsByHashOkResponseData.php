<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetAllJobsByHashOkResponseData
{
    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('created_at')]
    public ?string $createdAt;

    #[SerializedName('detail')]
    public ?string $detail;

    #[SerializedName('download_url')]
    public ?string $downloadUrl;

    #[SerializedName('file_id')]
    public ?float $fileId;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('integration')]
    public ?string $integration;

    #[SerializedName('progress')]
    public ?float $progress;

    #[SerializedName('status')]
    public ?string $status;

    #[SerializedName('type')]
    public ?string $type;

    #[SerializedName('updated_at')]
    public ?string $updatedAt;

    #[SerializedName('zip')]
    public ?bool $zip;

    public function __construct(
        ?string $authId = null,
        ?string $createdAt = null,
        ?string $detail = null,
        ?string $downloadUrl = null,
        ?float $fileId = null,
        ?string $hash = null,
        ?float $id = null,
        ?string $integration = null,
        ?float $progress = null,
        ?string $status = null,
        ?string $type = null,
        ?string $updatedAt = null,
        ?bool $zip = null
    ) {
        $this->authId = $authId;
        $this->createdAt = $createdAt;
        $this->detail = $detail;
        $this->downloadUrl = $downloadUrl;
        $this->fileId = $fileId;
        $this->hash = $hash;
        $this->id = $id;
        $this->integration = $integration;
        $this->progress = $progress;
        $this->status = $status;
        $this->type = $type;
        $this->updatedAt = $updatedAt;
        $this->zip = $zip;
    }
}
