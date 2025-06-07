<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-workflow-usage
 *
 * > [!WARNING]
 * > This endpoint is in the process of closing down. Refer to "[Actions Get workflow
 * usage and Get workflow run usage endpoints closing
 * down](https://github.blog/changelog/2025-02-02-actions-get-workflow-usage-and-get-workflow-run-usage-endpoints-closing-down/)"
 * for more information.
 *
 * Gets the number of billable minutes used by a specific workflow during the
 * current billing cycle. Billable minutes only apply to workflows in private repositories that use
 * GitHub-hosted runners. Usage is listed for each GitHub-hosted runner operating system in
 * milliseconds. Any job re-runs are also included in the usage. The usage does not include the
 * multiplier for macOS and Windows runners and is not rounded up to the nearest whole minute. For more
 * information, see "[Managing billing for GitHub
 * Actions](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-actions)".
 *
 * You
 * can replace `workflow_id` with the workflow file name. For example, you could use
 * `main.yaml`.
 *
 * Anyone with read access to the repository can use this endpoint.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint with a private
 * repository.
 */
class ActionsGetWorkflowUsage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}/timing";
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
