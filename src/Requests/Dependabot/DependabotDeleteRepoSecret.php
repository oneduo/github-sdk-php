<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/delete-repo-secret
 *
 * Deletes a secret in a repository using the secret name.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class DependabotDeleteRepoSecret extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/secrets/{$this->secretName}";
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
