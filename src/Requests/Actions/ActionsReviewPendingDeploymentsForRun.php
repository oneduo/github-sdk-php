<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/review-pending-deployments-for-run
 *
 * Approve or reject pending deployments that are waiting on approval by a required reviewer.
 *
 * Required
 * reviewers with read access to the repository contents and deployments can use this endpoint.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsReviewPendingDeploymentsForRun extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/pending_deployments";
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
