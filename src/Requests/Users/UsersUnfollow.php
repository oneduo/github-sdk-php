<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/unfollow
 *
 * OAuth app tokens and personal access tokens (classic) need the `user:follow` scope to use this
 * endpoint.
 */
class UsersUnfollow extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/following/{$this->username}";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
