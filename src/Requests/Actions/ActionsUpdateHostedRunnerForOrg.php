<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/update-hosted-runner-for-org
 *
 * Updates a GitHub-hosted runner for an organization.
 * OAuth app tokens and personal access tokens
 * (classic) need the `manage_runners:org` scope to use this endpoint.
 */
class ActionsUpdateHostedRunnerForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
