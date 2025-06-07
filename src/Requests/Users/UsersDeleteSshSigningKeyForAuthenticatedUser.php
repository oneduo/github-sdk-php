<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-ssh-signing-key-for-authenticated-user
 *
 * Deletes an SSH signing key from the authenticated user's GitHub account.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `admin:ssh_signing_key` scope to use this endpoint.
 */
class UsersDeleteSshSigningKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/ssh_signing_keys/{$this->sshSigningKeyId}";
    }

    /**
     * @param  int  $sshSigningKeyId  The unique identifier of the SSH signing key.
     */
    public function __construct(
        protected int $sshSigningKeyId,
    ) {}
}
