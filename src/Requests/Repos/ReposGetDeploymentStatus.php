<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-deployment-status
 *
 * Users with pull access can view a deployment status for a deployment:
 */
class ReposGetDeploymentStatus extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/deployments/{$this->deploymentId}/statuses/{$this->statusId}";
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
        protected int $statusId,
    ) {}
}
