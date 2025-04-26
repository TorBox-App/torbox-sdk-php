<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetTorrentCachedAvailabilityOkResponse
{
    #[SerializedName('data')]
    public ?array $data;

    #[SerializedName('detail')]
    public ?string $detail;

    #[SerializedName('error')]
    public ?string $error;

    #[SerializedName('success')]
    public ?bool $success;

    public function __construct(?array $data = [], ?string $detail = null, ?string $error = null, ?bool $success = null)
    {
        $this->data = $data;
        $this->detail = $detail;
        $this->error = $error;
        $this->success = $success;
    }
}
