<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/disable-workflow
 *
 * Disables a workflow and sets the `state` of the workflow to `disabled_manually`. You can replace
 * `workflow_id` with the workflow file name. For example, you could use `main.yaml`.
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDisableWorkflow extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/disable";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $workflowId  The ID of the workflow. You can also pass the workflow file name as a string.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected mixed $workflowId,
    ) {}
}
