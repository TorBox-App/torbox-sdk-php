<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebDownloadOkResponseData
{
    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('webdownload_id')]
    public ?string $webdownloadId;

    public function __construct(?string $authId = null, ?string $hash = null, ?string $webdownloadId = null)
    {
        $this->authId = $authId;
        $this->hash = $hash;
        $this->webdownloadId = $webdownloadId;
    }
}
