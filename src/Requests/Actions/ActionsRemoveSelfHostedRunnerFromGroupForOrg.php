<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/remove-self-hosted-runner-from-group-for-org
 *
 * Removes a self-hosted runner from a group configured in an organization. The runner is then returned
 * to the default group.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org`
 * scope to use this endpoint.
 */
class ActionsRemoveSelfHostedRunnerFromGroupForOrg extends Request {
    protected Method $method = Method::DELETE;

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
