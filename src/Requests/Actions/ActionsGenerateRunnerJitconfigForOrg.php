<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/generate-runner-jitconfig-for-org
 *
 * Generates a configuration that can be passed to the runner application at startup.
 *
 * The
 * authenticated user must have admin access to the organization.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the`admin:org` scope to use this endpoint. If the repository is private, OAuth
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGenerateRunnerJitconfigForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runners/generate-jitconfig";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
