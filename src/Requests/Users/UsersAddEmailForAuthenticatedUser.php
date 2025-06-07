<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/add-email-for-authenticated-user
 *
 * OAuth app tokens and personal access tokens (classic) need the `user` scope to use this endpoint.
 */
class UsersAddEmailForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/emails';
    }

    public function __construct() {}
}
