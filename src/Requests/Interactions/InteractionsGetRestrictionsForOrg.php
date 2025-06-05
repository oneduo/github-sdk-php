<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/get-restrictions-for-org
 *
 * Shows which type of GitHub user can interact with this organization and when the restriction
 * expires. If there is no restrictions, you will see an empty response.
 */
class InteractionsGetRestrictionsForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/interaction-limits";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
