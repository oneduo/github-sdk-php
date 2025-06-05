<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * campaigns/update-campaign
 *
 * Updates a campaign in an organization.
 *
 * The authenticated user must be an owner or security manager
 * for the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `security_events` scope to use this endpoint.
 */
class CampaignsUpdateCampaign extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
