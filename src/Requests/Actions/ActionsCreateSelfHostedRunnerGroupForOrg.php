<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-self-hosted-runner-group-for-org
 *
 * Creates a new self-hosted runner group for an organization.
 *
 * OAuth tokens and personal access tokens
 * (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsCreateSelfHostedRunnerGroupForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runner-groups";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
