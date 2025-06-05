<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/block
 *
 * Blocks the given user and returns a 204. If the authenticated user cannot block the given user a 422
 * is returned.
 */
class UsersBlock extends Request {
    protected Method $method = Method::PUT;

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
