<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-self-hosted-runner-for-org
 *
 * Gets a specific self-hosted runner configured in an organization.
 *
 * Authenticated users must have
 * admin access to the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `admin:org` scope to use this endpoint. If the repository is private, the `repo`
 * scope is also required.
 */
class ActionsGetSelfHostedRunnerForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/runners/{$this->runnerId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function __construct(
        protected string $org,
        protected int $runnerId,
    ) {}
}
