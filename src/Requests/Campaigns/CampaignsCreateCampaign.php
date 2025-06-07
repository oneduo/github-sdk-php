<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * campaigns/create-campaign
 *
 * Create a campaign for an organization.
 *
 * The authenticated user must be an owner or security manager
 * for the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `security_events` scope to use this endpoint.
 *
 * Fine-grained tokens must have the "Code
 * scanning alerts" repository permissions (read) on all repositories included
 * in the campaign.
 */
class CampaignsCreateCampaign extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/campaigns";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
