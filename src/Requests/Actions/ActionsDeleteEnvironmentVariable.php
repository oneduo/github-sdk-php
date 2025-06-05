<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-environment-variable
 *
 * Deletes an environment variable using the variable name.
 *
 * Authenticated users must have collaborator
 * access to a repository to create, update, or read variables.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDeleteEnvironmentVariable extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/variables/{$this->name}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $name,
        protected string $environmentName,
    ) {}
}
