<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-repo-variable
 *
 * Gets a specific variable in a repository.
 *
 * The authenticated user must have collaborator access to
 * the repository to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `repo` scope to use this endpoint.
 */
class ActionsGetRepoVariable extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/variables/{$this->name}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $name,
    ) {}
}
