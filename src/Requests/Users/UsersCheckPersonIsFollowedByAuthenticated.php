<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/check-person-is-followed-by-authenticated
 */
class UsersCheckPersonIsFollowedByAuthenticated extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/following/{$this->username}";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
