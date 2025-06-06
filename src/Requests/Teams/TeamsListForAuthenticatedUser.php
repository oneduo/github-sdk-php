<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-for-authenticated-user
 *
 * List all of the teams across all of the organizations to which the authenticated
 * user
 * belongs.
 *
 * OAuth app tokens and personal access tokens (classic) need the `user`, `repo`, or
 * `read:org` scope to use this endpoint.
 *
 * When using a fine-grained personal access token, the
 * resource owner of the token must be a single organization, and the response will only include the
 * teams from that organization.
 */
class TeamsListForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/teams';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
