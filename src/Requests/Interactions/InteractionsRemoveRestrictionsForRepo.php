<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/remove-restrictions-for-repo
 *
 * Removes all interaction restrictions from the given repository. You must have owner or admin access
 * to remove restrictions. If the interaction limit is set for the user or organization that owns this
 * repository, you will receive a `409 Conflict` response and will not be able to use this endpoint to
 * change the interaction limit for a single repository.
 */
class InteractionsRemoveRestrictionsForRepo extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/interaction-limits";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
