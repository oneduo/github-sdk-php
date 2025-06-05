<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\HostedCompute;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * hosted-compute/list-network-configurations-for-org
 *
 * Lists all hosted compute network configurations configured in an organization.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `read:network_configurations` scope to use this endpoint.
 */
class HostedComputeListNetworkConfigurationsForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/settings/network-configurations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
