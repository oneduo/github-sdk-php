<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-public-key-for-authenticated-user
 *
 * Gets your public key, which you need to encrypt secrets. You need to encrypt a secret before you can
 * create or update secrets.
 *
 * The authenticated user must have Codespaces access to use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `codespace` or
 * `codespace:secrets` scope to use this endpoint.
 */
class CodespacesGetPublicKeyForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/codespaces/secrets/public-key';
    }

    public function __construct() {}
}
