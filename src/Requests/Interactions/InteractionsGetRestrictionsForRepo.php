<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Interactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * interactions/get-restrictions-for-repo
 *
 * Shows which type of GitHub user can interact with this repository and when the restriction expires.
 * If there are no restrictions, you will see an empty response.
 */
class InteractionsGetRestrictionsForRepo extends Request {
    protected Method $method = Method::GET;

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
