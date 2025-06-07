<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-runner-applications-for-repo
 *
 * Lists binaries for the runner application that you can download and run.
 *
 * Authenticated users must
 * have admin access to the repository to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsListRunnerApplicationsForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/downloads";
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
