<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * hosted-compute/create-network-configuration-for-org
 *
 * Creates a hosted compute network configuration for an organization.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `write:network_configurations` scope to use this endpoint.
 */
class HostedComputeCreateNetworkConfigurationForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/settings/network-configurations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
