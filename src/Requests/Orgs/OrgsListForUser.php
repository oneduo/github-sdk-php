<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-for-user
 *
 * List [public organization
 * memberships](https://docs.github.com/articles/publicizing-or-concealing-organization-membership) for
 * the specified user.
 *
 * This method only lists _public_ memberships, regardless of authentication. If
 * you need to fetch all of the organization memberships (public and private) for the authenticated
 * user, use the [List organizations for the authenticated
 * user](https://docs.github.com/rest/orgs/orgs#list-organizations-for-the-authenticated-user) API
 * instead.
 */
class OrgsListForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/orgs";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $username,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
