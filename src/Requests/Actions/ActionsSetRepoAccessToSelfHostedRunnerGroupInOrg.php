<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-repo-access-to-self-hosted-runner-group-in-org
 *
 * Replaces the list of repositories that have access to a self-hosted runner group configured in an
 * organization.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org` scope to
 * use this endpoint.
 */
class ActionsSetRepoAccessToSelfHostedRunnerGroupInOrg extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/runner-groups/{$this->runnerGroupId}/repositories";
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
