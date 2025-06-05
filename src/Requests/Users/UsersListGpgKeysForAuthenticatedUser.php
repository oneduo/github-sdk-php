<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-gpg-keys-for-authenticated-user
 *
 * Lists the current user's GPG keys.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `read:gpg_key` scope to use this endpoint.
 */
class UsersListGpgKeysForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/gpg_keys';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
