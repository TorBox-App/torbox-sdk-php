<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebDownloadRequest
{
    /**
     * An accessible link to any file on the internet. Cannot be a redirection.
     */
    #[SerializedName('link')]
    public ?string $link;

    public function __construct(?string $link = null)
    {
        $this->link = $link;
    }
}
