<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/add-self-hosted-runner-to-group-for-org
 *
 * Adds a self-hosted runner to a runner group configured in an organization.
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsAddSelfHostedRunnerToGroupForOrg extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runner-groups/{$this->runnerGroupId}/runners/{$this->runnerId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function __construct(
        protected string $org,
        protected int $runnerGroupId,
        protected int $runnerId,
    ) {}
}
