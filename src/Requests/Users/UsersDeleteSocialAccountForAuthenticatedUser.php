<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-social-account-for-authenticated-user
 *
 * Deletes one or more social accounts from the authenticated user's profile.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `user` scope to use this endpoint.
 */
class UsersDeleteSocialAccountForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/user/social_accounts';
    }

    public function __construct() {}
}
