<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-secret-for-authenticated-user
 *
 * Gets a development environment secret available to a user's codespaces without revealing its
 * encrypted value.
 *
 * The authenticated user must have Codespaces access to use this endpoint.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `codespace` or `codespace:secrets` scope to
 * use this endpoint.
 */
class CodespacesGetSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $secretName,
    ) {}
}
