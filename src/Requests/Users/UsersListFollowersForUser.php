<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-followers-for-user
 *
 * Lists the people following the specified user.
 */
class UsersListFollowersForUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/users/{$this->username}/followers";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $username,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
