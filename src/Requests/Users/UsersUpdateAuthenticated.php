<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/update-authenticated
 *
 * **Note:** If your email is set to private and you send an `email` parameter as part of this request
 * to update your profile, your privacy settings are still enforced: the email address will not be
 * displayed on your public profile or via the API.
 */
class UsersUpdateAuthenticated extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return '/user';
    }

    public function __construct() {}
}
