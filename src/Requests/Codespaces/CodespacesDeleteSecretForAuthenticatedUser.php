<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-secret-for-authenticated-user
 *
 * Deletes a development environment secret from a user's codespaces using the secret name. Deleting
 * the secret will remove access from all codespaces that were allowed to access the secret.
 *
 * The
 * authenticated user must have Codespaces access to use this endpoint.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `codespace` or `codespace:secrets` scope to use this endpoint.
 */
class CodespacesDeleteSecretForAuthenticatedUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/user/codespaces/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $secretName,
    ) {}
}
