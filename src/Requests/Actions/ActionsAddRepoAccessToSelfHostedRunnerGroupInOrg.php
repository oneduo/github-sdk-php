<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/add-repo-access-to-self-hosted-runner-group-in-org
 *
 * Adds a repository to the list of repositories that can access a self-hosted runner group. The runner
 * group must have `visibility` set to `selected`. For more information, see "[Create a self-hosted
 * runner group for an organization](#create-a-self-hosted-runner-group-for-an-organization)."
 *
 * OAuth
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsAddRepoAccessToSelfHostedRunnerGroupInOrg extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runner-groups/{$this->runnerGroupId}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function __construct(
        protected string $org,
        protected int $runnerGroupId,
        protected int $repositoryId,
    ) {}
}
