<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-usage-for-org
 *
 * Gets the total GitHub Actions cache usage for an organization.
 * The data fetched using this API is
 * refreshed approximately every 5 minutes, so values returned from this endpoint may take at least 5
 * minutes to get updated.
 *
 * OAuth tokens and personal access tokens (classic) need the `read:org` scope
 * to use this endpoint.
 */
class ActionsGetActionsCacheUsageForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/cache/usage";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
