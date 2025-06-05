<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/add-custom-labels-to-self-hosted-runner-for-org
 *
 * Adds custom labels to a self-hosted runner configured in an organization.
 *
 * Authenticated users must
 * have admin access to the organization to use this endpoint.
 *
 * OAuth tokens and personal access tokens
 * (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsAddCustomLabelsToSelfHostedRunnerForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runners/{$this->runnerId}/labels";
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
