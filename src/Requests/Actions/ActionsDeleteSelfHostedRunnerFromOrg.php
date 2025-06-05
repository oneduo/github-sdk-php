<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-self-hosted-runner-from-org
 *
 * Forces the removal of a self-hosted runner from an organization. You can use this endpoint to
 * completely remove the runner when the machine you were using no longer exists.
 *
 * Authenticated users
 * must have admin access to the organization to use this endpoint.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the`admin:org` scope to use this endpoint. If the repository is private, OAuth
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDeleteSelfHostedRunnerFromOrg extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
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
