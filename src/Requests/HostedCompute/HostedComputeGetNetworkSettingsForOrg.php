<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * hosted-compute/get-network-settings-for-org
 *
 * Gets a hosted compute network settings resource configured for an organization.
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `read:network_configurations` scope to use this
 * endpoint.
 */
class HostedComputeGetNetworkSettingsForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/settings/network-settings/{$this->networkSettingsId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkSettingsId  Unique identifier of the hosted compute network settings.
     */
    public function __construct(
        protected string $org,
        protected string $networkSettingsId,
    ) {}
}
