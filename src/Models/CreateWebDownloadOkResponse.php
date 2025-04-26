<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebDownloadOkResponse
{
    #[SerializedName('data')]
    public ?CreateWebDownloadOkResponseData $data;

    #[SerializedName('detail')]
    public ?string $detail;

    #[SerializedName('error')]
    public mixed $error;

    #[SerializedName('success')]
    public ?bool $success;

    public function __construct(
        ?CreateWebDownloadOkResponseData $data = null,
        ?string $detail = null,
        mixed $error,
        ?bool $success = null
    ) {
        $this->data = $data;
        $this->detail = $detail;
        $this->error = $error;
        $this->success = $success;
    }
}
