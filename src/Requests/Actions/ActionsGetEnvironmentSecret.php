<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-environment-secret
 *
 * Gets a single environment secret without revealing its encrypted value.
 *
 * Authenticated users must
 * have collaborator access to a repository to create, update, or read secrets.
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetEnvironmentSecret extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $environmentName,
        protected string $secretName,
    ) {}
}
