<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-public-ssh-key-for-authenticated-user
 *
 * View extended details for a single public SSH key.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `read:public_key` scope to use this endpoint.
 */
class UsersGetPublicSshKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

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
