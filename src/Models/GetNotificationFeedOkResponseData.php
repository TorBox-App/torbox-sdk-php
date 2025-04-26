<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetNotificationFeedOkResponseData
{
    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('created_at')]
    public ?string $createdAt;

    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('message')]
    public ?string $message;

    #[SerializedName('title')]
    public ?string $title;

    public function __construct(
        ?string $authId = null,
        ?string $createdAt = null,
        ?float $id = null,
        ?string $message = null,
        ?string $title = null
    ) {
        $this->authId = $authId;
        $this->createdAt = $createdAt;
        $this->id = $id;
        $this->message = $message;
        $this->title = $title;
    }
}
