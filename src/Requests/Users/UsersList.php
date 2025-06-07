<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list
 *
 * Lists all users, in the order that they signed up on GitHub. This list includes personal user
 * accounts and organization accounts.
 *
 * Note: Pagination is powered exclusively by the `since`
 * parameter. Use the [Link
 * header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers) to
 * get the URL for the next page of users.
 */
class UsersList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    /**
     * @param  null|int  $since  A user ID. Only return users with an ID greater than this ID.
     */
    public function __construct(
        protected ?int $since = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['since' => $this->since]);
    }
}
