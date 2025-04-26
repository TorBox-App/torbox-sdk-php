<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateUsenetDownloadOkResponseData
{
    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('hash')]
    public ?string $hash;

    #[SerializedName('usenetdownload_id')]
    public ?string $usenetdownloadId;

    public function __construct(?string $authId = null, ?string $hash = null, ?string $usenetdownloadId = null)
    {
        $this->authId = $authId;
        $this->hash = $hash;
        $this->usenetdownloadId = $usenetdownloadId;
    }
}
