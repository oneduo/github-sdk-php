<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/re-run-job-for-workflow-run
 *
 * Re-run a job and its dependent jobs in a workflow run.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class ActionsReRunJobForWorkflowRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/jobs/{$this->jobId}/rerun";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $jobId  The unique identifier of the job.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $jobId,
    ) {}
}
