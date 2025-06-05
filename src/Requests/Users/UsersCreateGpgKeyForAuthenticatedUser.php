<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-gpg-key-for-authenticated-user
 *
 * Adds a GPG key to the authenticated user's GitHub account.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `write:gpg_key` scope to use this endpoint.
 */
class UsersCreateGpgKeyForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/user/gpg_keys';
    }

    public function __construct() {}
}
