<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-deployment-branch-policy
 *
 * Gets a deployment branch or tag policy for an environment.
 *
 * Anyone with read access to the
 * repository can use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `repo` scope to use this endpoint with a private repository.
 */
class ReposGetDeploymentBranchPolicy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment-branch-policies/{$this->branchPolicyId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  int  $branchPolicyId  The unique identifier of the branch policy.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $environmentName,
        protected int $branchPolicyId,
    ) {}
}
