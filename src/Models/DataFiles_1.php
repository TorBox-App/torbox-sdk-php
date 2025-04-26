<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DataFiles1
{
    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('md5')]
    public ?string $md5;

    #[SerializedName('mimetype')]
    public ?string $mimetype;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('s3_path')]
    public ?string $s3Path;

    #[SerializedName('short_name')]
    public ?string $shortName;

    #[SerializedName('size')]
    public ?float $size;

    public function __construct(
        ?float $id = null,
        ?string $md5 = null,
        ?string $mimetype = null,
        ?string $name = null,
        ?string $s3Path = null,
        ?string $shortName = null,
        ?float $size = null
    ) {
        $this->id = $id;
        $this->md5 = $md5;
        $this->mimetype = $mimetype;
        $this->name = $name;
        $this->s3Path = $s3Path;
        $this->shortName = $shortName;
        $this->size = $size;
    }
}
