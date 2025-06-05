<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\PrivateRegistries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * private-registries/list-org-private-registries
 *
 *
 * Lists all private registry configurations available at the organization-level without revealing
 * their encrypted
 * values.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org`
 * scope to use this endpoint.
 */
class PrivateRegistriesListOrgPrivateRegistries extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/private-registries";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
