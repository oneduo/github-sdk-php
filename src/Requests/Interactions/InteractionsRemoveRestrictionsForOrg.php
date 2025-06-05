<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/remove-restrictions-for-org
 *
 * Removes all interaction restrictions from public repositories in the given organization. You must be
 * an organization owner to remove restrictions.
 */
class InteractionsRemoveRestrictionsForOrg extends Request {
    protected Method $method = Method::DELETE;

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
