<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DataFiles3
{
    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('size')]
    public ?float $size;

    public function __construct(?string $name = null, ?float $size = null)
    {
        $this->name = $name;
        $this->size = $size;
    }
}
