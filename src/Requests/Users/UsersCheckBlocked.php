<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/check-blocked
 *
 * Returns a 204 if the given user is blocked by the authenticated user. Returns a 404 if the given
 * user is not blocked by the authenticated user, or if the given user account has been identified as
 * spam by GitHub.
 */
class UsersCheckBlocked extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/blocks/{$this->username}";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
