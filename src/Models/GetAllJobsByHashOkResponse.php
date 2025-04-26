<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetAllJobsByHashOkResponse
{
    /**
     * @var GetAllJobsByHashOkResponseData[]|null
     */
    #[SerializedName('data')]
    public ?array $data;

    #[SerializedName('detail')]
    public ?string $detail;

    #[SerializedName('error')]
    public mixed $error;

    #[SerializedName('success')]
    public ?bool $success;

    public function __construct(?array $data = [], ?string $detail = null, mixed $error, ?bool $success = null)
    {
        $this->data = $data;
        $this->detail = $detail;
        $this->error = $error;
        $this->success = $success;
    }
}
