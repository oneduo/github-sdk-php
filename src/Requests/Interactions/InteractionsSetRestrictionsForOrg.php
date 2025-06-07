<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/set-restrictions-for-org
 *
 * Temporarily restricts interactions to a certain type of GitHub user in any public repository in the
 * given organization. You must be an organization owner to set these restrictions. Setting the
 * interaction limit at the organization level will overwrite any interaction limits that are set for
 * individual repositories owned by the organization.
 */
class InteractionsSetRestrictionsForOrg extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/interaction-limits";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
