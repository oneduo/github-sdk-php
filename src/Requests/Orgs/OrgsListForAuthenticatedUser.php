<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-for-authenticated-user
 *
 * List organizations for the authenticated user.
 *
 * For OAuth app tokens and personal access tokens
 * (classic), this endpoint only lists organizations that your authorization allows you to operate on
 * in some way (e.g., you can list teams with `read:org` scope, you can publicize your organization
 * membership with `user` scope, etc.). Therefore, this API requires at least `user` or `read:org`
 * scope for OAuth app tokens and personal access tokens (classic). Requests with insufficient scope
 * will receive a `403 Forbidden` response.
 *
 * > [!NOTE]
 * > Requests using a fine-grained access token
 * will receive a `200 Success` response with an empty list.
 */
class OrgsListForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/orgs';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
