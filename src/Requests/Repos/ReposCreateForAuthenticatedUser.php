<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-for-authenticated-user
 *
 * Creates a new repository for the authenticated user.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `public_repo` or `repo` scope to create a public repository, and `repo` scope to
 * create a private repository.
 */
class ReposCreateForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/user/repos';
    }

    public function __construct() {}
}
