<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-environment-variable
 *
 * Create an environment variable that you can reference in a GitHub Actions workflow.
 *
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read variables.
 *
 * OAuth
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsCreateEnvironmentVariable extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/variables";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $environmentName,
    ) {}
}
