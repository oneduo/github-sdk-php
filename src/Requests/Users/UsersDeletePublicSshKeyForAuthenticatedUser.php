<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-public-ssh-key-for-authenticated-user
 *
 * Removes a public SSH key from the authenticated user's GitHub account.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `admin:public_key` scope to use this endpoint.
 */
class UsersDeletePublicSshKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/keys/{$this->keyId}";
    }

    /**
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function __construct(
        protected int $keyId,
    ) {}
}
