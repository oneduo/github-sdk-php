<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-ssh-signing-key-for-authenticated-user
 *
 * Creates an SSH signing key for the authenticated user's GitHub account.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `write:ssh_signing_key` scope to use this endpoint.
 */
class UsersCreateSshSigningKeyForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/user/ssh_signing_keys';
    }

    public function __construct() {}
}
