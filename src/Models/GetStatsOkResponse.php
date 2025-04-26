<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetStatsOkResponse
{
    #[SerializedName('data')]
    public ?GetStatsOkResponseData $data;

    #[SerializedName('detail')]
    public ?string $detail;

    #[SerializedName('error')]
    public ?bool $error;

    #[SerializedName('success')]
    public ?bool $success;

    public function __construct(
        ?GetStatsOkResponseData $data = null,
        ?string $detail = null,
        ?bool $error = null,
        ?bool $success = null
    ) {
        $this->data = $data;
        $this->detail = $detail;
        $this->error = $error;
        $this->success = $success;
    }
}
