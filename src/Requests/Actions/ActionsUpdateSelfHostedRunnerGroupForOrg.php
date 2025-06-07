<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/update-self-hosted-runner-group-for-org
 *
 * Updates the `name` and `visibility` of a self-hosted runner group in an organization.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsUpdateSelfHostedRunnerGroupForOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
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
