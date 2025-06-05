<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * campaigns/get-campaign-summary
 *
 * Gets a campaign for an organization.
 *
 * The authenticated user must be an owner or security manager
 * for the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `security_events` scope to use this endpoint.
 */
class CampaignsGetCampaignSummary extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/campaigns/{$this->campaignNumber}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $campaignNumber  The campaign number.
     */
    public function __construct(
        protected string $org,
        protected int $campaignNumber,
    ) {}
}
