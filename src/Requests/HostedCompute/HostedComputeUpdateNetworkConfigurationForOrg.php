<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * hosted-compute/update-network-configuration-for-org
 *
 * Updates a hosted compute network configuration for an organization.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `write:network_configurations` scope to use this endpoint.
 */
class HostedComputeUpdateNetworkConfigurationForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/settings/network-configurations/{$this->networkConfigurationId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkConfigurationId  Unique identifier of the hosted compute network configuration.
     */
    public function __construct(
        protected string $org,
        protected string $networkConfigurationId,
    ) {}
}
