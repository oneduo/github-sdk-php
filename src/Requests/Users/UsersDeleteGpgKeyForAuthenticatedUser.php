<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-gpg-key-for-authenticated-user
 *
 * Removes a GPG key from the authenticated user's GitHub account.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:gpg_key` scope to use this endpoint.
 */
class UsersDeleteGpgKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/gpg_keys/{$this->gpgKeyId}";
    }

    /**
     * @param  int  $gpgKeyId  The unique identifier of the GPG key.
     */
    public function __construct(
        protected int $gpgKeyId,
    ) {}
}
