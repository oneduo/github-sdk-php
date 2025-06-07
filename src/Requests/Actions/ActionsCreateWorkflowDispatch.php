<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-workflow-dispatch
 *
 * You can use this endpoint to manually trigger a GitHub Actions workflow run. You can replace
 * `workflow_id` with the workflow file name. For example, you could use `main.yaml`.
 *
 * You must
 * configure your GitHub Actions workflow to run when the [`workflow_dispatch`
 * webhook](/developers/webhooks-and-events/webhook-events-and-payloads#workflow_dispatch) event
 * occurs. The `inputs` are configured in the workflow file. For more information about how to
 * configure the `workflow_dispatch` event in the workflow file, see "[Events that trigger
 * workflows](/actions/reference/events-that-trigger-workflows#workflow_dispatch)."
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsCreateWorkflowDispatch extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/dispatches";
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
