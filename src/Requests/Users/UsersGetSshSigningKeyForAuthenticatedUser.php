<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-ssh-signing-key-for-authenticated-user
 *
 * Gets extended details for an SSH signing key.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `read:ssh_signing_key` scope to use this endpoint.
 */
class UsersGetSshSigningKeyForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

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
