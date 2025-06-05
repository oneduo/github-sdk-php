<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/set-primary-email-visibility-for-authenticated-user
 *
 * Sets the visibility for your primary email addresses.
 */
class UsersSetPrimaryEmailVisibilityForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return '/user/email/visibility';
    }

    public function __construct() {}
}
