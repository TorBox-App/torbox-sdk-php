<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Settings
{
    #[SerializedName('anothersetting')]
    public ?string $anothersetting;

    #[SerializedName('setting')]
    public ?string $setting;

    public function __construct(?string $anothersetting = null, ?string $setting = null)
    {
        $this->anothersetting = $anothersetting;
        $this->setting = $setting;
    }
}
