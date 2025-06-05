<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-runner-applications-for-org
 *
 * Lists binaries for the runner application that you can download and run.
 *
 * Authenticated users must
 * have admin access to the organization to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `admin:org` scope to use this endpoint.  If the repository is private, the
 * `repo` scope is also required.
 */
class ActionsListRunnerApplicationsForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runners/downloads";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
