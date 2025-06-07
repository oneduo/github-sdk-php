<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-public-emails-for-authenticated-user
 *
 * Lists your publicly visible email address, which you can set with the
 * [Set primary email visibility
 * for the authenticated
 * user](https://docs.github.com/rest/users/emails#set-primary-email-visibility-for-the-authenticated-user)
 * endpoint.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `user:email` scope to use this endpoint.
 */
class UsersListPublicEmailsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/public_emails';
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
