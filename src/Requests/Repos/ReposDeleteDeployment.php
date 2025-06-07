<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-deployment
 *
 * If the repository only has one deployment, you can delete the deployment regardless of its status.
 * If the repository has more than one deployment, you can only delete inactive deployments. This
 * ensures that repositories with multiple deployments will always have an active deployment.
 *
 * To set a
 * deployment as inactive, you must:
 *
 * *   Create a new deployment that is active so that the system has
 * a record of the current state, then delete the previously active deployment.
 * *   Mark the active
 * deployment as inactive by adding any non-successful deployment status.
 *
 * For more information, see
 * "[Create a deployment](https://docs.github.com/rest/deployments/deployments/#create-a-deployment)"
 * and "[Create a deployment
 * status](https://docs.github.com/rest/deployments/statuses#create-a-deployment-status)."
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `repo` or `repo_deployment` scope to use this
 * endpoint.
 */
class ReposDeleteDeployment extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/deployments/{$this->deploymentId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $deploymentId  deployment_id parameter
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $deploymentId,
    ) {}
}
