<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/update-repo-variable
 *
 * Updates a repository variable that you can reference in a GitHub Actions workflow.
 *
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read variables.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsUpdateRepoVariable extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
