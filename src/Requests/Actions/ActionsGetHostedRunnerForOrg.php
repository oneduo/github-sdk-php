<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-hosted-runner-for-org
 *
 * Gets a GitHub-hosted runner configured in an organization.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `manage_runners:org` scope to use this endpoint.
 */
class ActionsGetHostedRunnerForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/hosted-runners/{$this->hostedRunnerId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hostedRunnerId  Unique identifier of the GitHub-hosted runner.
     */
    public function __construct(
        protected string $org,
        protected int $hostedRunnerId,
    ) {}
}
