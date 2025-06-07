<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-public-ssh-key-for-authenticated-user
 *
 * Adds a public SSH key to the authenticated user's GitHub account.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `write:gpg_key` scope to use this endpoint.
 */
class UsersCreatePublicSshKeyForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/keys';
    }

    public function __construct() {}
}
