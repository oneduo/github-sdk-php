<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-email-for-authenticated-user
 *
 * OAuth app tokens and personal access tokens (classic) need the `user` scope to use this endpoint.
 */
class UsersDeleteEmailForAuthenticatedUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return '/user/emails';
    }

    public function __construct() {}
}
