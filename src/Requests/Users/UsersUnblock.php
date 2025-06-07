<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/unblock
 *
 * Unblocks the given user and returns a 204.
 */
class UsersUnblock extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/blocks/{$this->username}";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
