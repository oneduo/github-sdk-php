<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-self-hosted-runner-from-repo
 *
 * Forces the removal of a self-hosted runner from a repository. You can use this endpoint to
 * completely remove the runner when the machine you were using no longer exists.
 *
 * Authenticated users
 * must have admin access to the repository to use this endpoint.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDeleteSelfHostedRunnerFromRepo extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/{$this->runnerId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runnerId,
    ) {}
}
