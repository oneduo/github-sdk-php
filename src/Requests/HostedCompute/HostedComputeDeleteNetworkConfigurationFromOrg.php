<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * hosted-compute/delete-network-configuration-from-org
 *
 * Deletes a hosted compute network configuration from an organization.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `write:network_configurations` scope to use this endpoint.
 */
class HostedComputeDeleteNetworkConfigurationFromOrg extends Request {
    protected Method $method = Method::DELETE;

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
