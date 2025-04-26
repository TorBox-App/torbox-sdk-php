<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateUsenetDownloadRequest
{
    /**
     * @var resource|false*/
    #[SerializedName('file')]
    public mixed $file;

    /**
     * An accessible link to an NZB file. Cannot be a redirection. Optional.
     */
    #[SerializedName('link')]
    public ?string $link;

    public function __construct(mixed $file, ?string $link = null)
    {
        $this->file = $file;
        $this->link = $link;
    }

    public function toMultipart(): array
    {
        return [
            [
                'name' => 'file',
                'contents' => $this->file,
                'filename' => 'file.pdf',
            ],

            [
                'name' => 'link',
                'contents' => $this->link,
            ],
        ];
    }
}
