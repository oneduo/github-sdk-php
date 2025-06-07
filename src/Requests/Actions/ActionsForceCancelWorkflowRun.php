<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/force-cancel-workflow-run
 *
 * Cancels a workflow run and bypasses conditions that would otherwise cause a workflow execution to
 * continue, such as an `always()` condition on a job.
 * You should only use this endpoint to cancel a
 * workflow run when the workflow run is not responding to [`POST
 * /repos/{owner}/{repo}/actions/runs/{run_id}/cancel`](/rest/actions/workflow-runs#cancel-a-workflow-run).
 *
 * OAuth
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsForceCancelWorkflowRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/force-cancel";
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
