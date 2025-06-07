<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-workflow-run
 *
 * Deletes a specific workflow run.
 *
 * Anyone with write access to the repository can use this
 * endpoint.
 *
 * If the repository is private, OAuth tokens and personal access tokens (classic) need the
 * `repo` scope to use this endpoint.
 */
class ActionsDeleteWorkflowRun extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runId,
    ) {}
}
