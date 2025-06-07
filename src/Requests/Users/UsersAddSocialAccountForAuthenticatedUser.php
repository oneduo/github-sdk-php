<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/add-social-account-for-authenticated-user
 *
 * Add one or more social accounts to the authenticated user's profile.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `user` scope to use this endpoint.
 */
class UsersAddSocialAccountForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/social_accounts';
    }

    public function __construct() {}
}
