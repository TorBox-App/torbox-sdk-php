<?php

namespace TorboxApi\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class GetHosterListOkResponseData
{
    #[SerializedName('daily_bandwidth_limit')]
    public ?float $dailyBandwidthLimit;

    #[SerializedName('daily_bandwidth_used')]
    public ?float $dailyBandwidthUsed;

    #[SerializedName('daily_link_limit')]
    public ?float $dailyLinkLimit;

    #[SerializedName('daily_link_used')]
    public ?float $dailyLinkUsed;

    /**
     * @var string[]|null
     */
    #[SerializedName('domains')]
    public ?array $domains;

    /**
     * @var string[]|null
     */
    #[SerializedName('domais')]
    public ?array $domais;

    /**
     * @var string[]|null
     */
    #[SerializedName('domaisn')]
    public ?array $domaisn;

    #[SerializedName('icon')]
    public ?string $icon;

    #[SerializedName('limit')]
    public ?float $limit;

    #[SerializedName('name')]
    public ?string $name;

    #[SerializedName('note')]
    public ?string $note;

    #[SerializedName('status')]
    public ?bool $status;

    #[SerializedName('type')]
    public ?string $type;

    #[SerializedName('url')]
    public ?string $url;

    public function __construct(
        ?float $dailyBandwidthLimit = null,
        ?float $dailyBandwidthUsed = null,
        ?float $dailyLinkLimit = null,
        ?float $dailyLinkUsed = null,
        ?array $domains = [],
        ?array $domais = [],
        ?array $domaisn = [],
        ?string $icon = null,
        ?float $limit = null,
        ?string $name = null,
        ?string $note = null,
        ?bool $status = null,
        ?string $type = null,
        ?string $url = null
    ) {
        $this->dailyBandwidthLimit = $dailyBandwidthLimit;
        $this->dailyBandwidthUsed = $dailyBandwidthUsed;
        $this->dailyLinkLimit = $dailyLinkLimit;
        $this->dailyLinkUsed = $dailyLinkUsed;
        $this->domains = $domains;
        $this->domais = $domais;
        $this->domaisn = $domaisn;
        $this->icon = $icon;
        $this->limit = $limit;
        $this->name = $name;
        $this->note = $note;
        $this->status = $status;
        $this->type = $type;
        $this->url = $url;
    }
}
