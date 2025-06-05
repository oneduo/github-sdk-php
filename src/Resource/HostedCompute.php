<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeCreateNetworkConfigurationForOrg;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeDeleteNetworkConfigurationFromOrg;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeGetNetworkConfigurationForOrg;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeGetNetworkSettingsForOrg;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeListNetworkConfigurationsForOrg;
use Oneduo\GitHubSdk\Requests\HostedCompute\HostedComputeUpdateNetworkConfigurationForOrg;
use Saloon\Http\Response;

class HostedCompute extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listNetworkConfigurationsForOrg(string $org, ?int $page): Response {
        return $this->connector->send(new HostedComputeListNetworkConfigurationsForOrg($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createNetworkConfigurationForOrg(string $org): Response {
        return $this->connector->send(new HostedComputeCreateNetworkConfigurationForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkConfigurationId  Unique identifier of the hosted compute network configuration.
     */
    public function getNetworkConfigurationForOrg(string $org, string $networkConfigurationId): Response {
        return $this->connector->send(new HostedComputeGetNetworkConfigurationForOrg($org, $networkConfigurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkConfigurationId  Unique identifier of the hosted compute network configuration.
     */
    public function deleteNetworkConfigurationFromOrg(string $org, string $networkConfigurationId): Response {
        return $this->connector->send(new HostedComputeDeleteNetworkConfigurationFromOrg($org, $networkConfigurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkConfigurationId  Unique identifier of the hosted compute network configuration.
     */
    public function updateNetworkConfigurationForOrg(string $org, string $networkConfigurationId): Response {
        return $this->connector->send(new HostedComputeUpdateNetworkConfigurationForOrg($org, $networkConfigurationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $networkSettingsId  Unique identifier of the hosted compute network settings.
     */
    public function getNetworkSettingsForOrg(string $org, string $networkSettingsId): Response {
        return $this->connector->send(new HostedComputeGetNetworkSettingsForOrg($org, $networkSettingsId));
    }
}
