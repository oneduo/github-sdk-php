<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-self-hosted-runner-group-for-org
 *
 * Gets a specific self-hosted runner group for an organization.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsGetSelfHostedRunnerGroupForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runner-groups/{$this->runnerGroupId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerGroupId  Unique identifier of the self-hosted runner group.
     */
    public function __construct(
        protected string $org,
        protected int $runnerGroupId,
    ) {}
}
