<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-hosted-runner-for-org
 *
 * Deletes a GitHub-hosted runner for an organization.
 */
class ActionsDeleteHostedRunnerForOrg extends Request {
    protected Method $method = Method::DELETE;

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
