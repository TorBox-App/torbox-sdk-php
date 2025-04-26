<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetUserDataOkResponseData
{
    #[SerializedName('auth_id')]
    public ?string $authId;

    #[SerializedName('base_email')]
    public ?string $baseEmail;

    #[SerializedName('cooldown_until')]
    public ?string $cooldownUntil;

    #[SerializedName('created_at')]
    public ?string $createdAt;

    #[SerializedName('customer')]
    public ?string $customer;

    #[SerializedName('email')]
    public ?string $email;

    #[SerializedName('id')]
    public ?float $id;

    #[SerializedName('is_subscribed')]
    public ?bool $isSubscribed;

    #[SerializedName('plan')]
    public ?float $plan;

    #[SerializedName('premium_expires_at')]
    public ?string $premiumExpiresAt;

    #[SerializedName('server')]
    public ?float $server;

    #[SerializedName('settings')]
    public ?Settings $settings;

    #[SerializedName('total_downloaded')]
    public ?float $totalDownloaded;

    #[SerializedName('updated_at')]
    public ?string $updatedAt;

    #[SerializedName('user_referral')]
    public ?string $userReferral;

    public function __construct(
        ?string $authId = null,
        ?string $baseEmail = null,
        ?string $cooldownUntil = null,
        ?string $createdAt = null,
        ?string $customer = null,
        ?string $email = null,
        ?float $id = null,
        ?bool $isSubscribed = null,
        ?float $plan = null,
        ?string $premiumExpiresAt = null,
        ?float $server = null,
        ?Settings $settings = null,
        ?float $totalDownloaded = null,
        ?string $updatedAt = null,
        ?string $userReferral = null
    ) {
        $this->authId = $authId;
        $this->baseEmail = $baseEmail;
        $this->cooldownUntil = $cooldownUntil;
        $this->createdAt = $createdAt;
        $this->customer = $customer;
        $this->email = $email;
        $this->id = $id;
        $this->isSubscribed = $isSubscribed;
        $this->plan = $plan;
        $this->premiumExpiresAt = $premiumExpiresAt;
        $this->server = $server;
        $this->settings = $settings;
        $this->totalDownloaded = $totalDownloaded;
        $this->updatedAt = $updatedAt;
        $this->userReferral = $userReferral;
    }
}
