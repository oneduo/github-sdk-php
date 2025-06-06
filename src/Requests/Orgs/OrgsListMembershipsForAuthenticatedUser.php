<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-memberships-for-authenticated-user
 *
 * Lists all of the authenticated user's organization memberships.
 */
class OrgsListMembershipsForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/memberships/orgs';
    }

    /**
     * @param  null|string  $state  Indicates the state of the memberships to return. If not specified, the API returns both active and pending memberships.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?string $state = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['state' => $this->state, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
