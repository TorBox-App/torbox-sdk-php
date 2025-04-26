<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetChangelogsJsonOkResponseData
{
    #[SerializedName('created_at')]
    public ?string $createdAt;

    #[SerializedName('html')]
    public ?string $html;

    #[SerializedName('id')]
    public ?string $id;

    #[SerializedName('link')]
    public ?string $link;

    #[SerializedName('markdown')]
    public ?string $markdown;

    #[SerializedName('name')]
    public ?string $name;

    public function __construct(
        ?string $createdAt = null,
        ?string $html = null,
        ?string $id = null,
        ?string $link = null,
        ?string $markdown = null,
        ?string $name = null
    ) {
        $this->createdAt = $createdAt;
        $this->html = $html;
        $this->id = $id;
        $this->link = $link;
        $this->markdown = $markdown;
        $this->name = $name;
    }
}
