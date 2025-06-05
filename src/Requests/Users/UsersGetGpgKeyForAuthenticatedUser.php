<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-gpg-key-for-authenticated-user
 *
 * View extended details for a single GPG key.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `read:gpg_key` scope to use this endpoint.
 */
class UsersGetGpgKeyForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/gpg_keys/{$this->gpgKeyId}";
    }

    /**
     * @param  int  $gpgKeyId  The unique identifier of the GPG key.
     */
    public function __construct(
        protected int $gpgKeyId,
    ) {}
}
