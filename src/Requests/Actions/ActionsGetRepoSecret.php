<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-repo-secret
 *
 * Gets a single repository secret without revealing its encrypted value.
 *
 * The authenticated user must
 * have collaborator access to the repository to use this endpoint.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetRepoSecret extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $secretName,
    ) {}
}
