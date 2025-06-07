<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/create-for-authenticated-user
 *
 * Creates a new codespace, owned by the authenticated user.
 *
 * This endpoint requires either a
 * `repository_id` OR a `pull_request` but not both.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesCreateForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/codespaces';
    }

    public function __construct() {}
}
