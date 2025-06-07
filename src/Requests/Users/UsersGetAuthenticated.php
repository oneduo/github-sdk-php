<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-authenticated
 *
 * OAuth app tokens and personal access tokens (classic) need the `user` scope in order for the
 * response to include private profile information.
 */
class UsersGetAuthenticated extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user';
    }

    public function __construct() {}
}
