<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * hosted-compute/get-network-configuration-for-org
 *
 * Gets a hosted compute network configuration configured in an organization.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `read:network_configurations` scope to use this endpoint.
 */
class HostedComputeGetNetworkConfigurationForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
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
