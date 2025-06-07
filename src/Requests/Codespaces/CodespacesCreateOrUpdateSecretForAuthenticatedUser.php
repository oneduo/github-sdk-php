<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/create-or-update-secret-for-authenticated-user
 *
 * Creates or updates a development environment secret for a user's codespace with an encrypted value.
 * Encrypt your secret
 * using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * The authenticated
 * user must have Codespaces access to use this endpoint.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `codespace` or `codespace:secrets` scope to use this endpoint.
 */
class CodespacesCreateOrUpdateSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

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
