<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/remove-repository-for-secret-for-authenticated-user
 *
 * Removes a repository from the selected repositories for a user's development environment
 * secret.
 *
 * The authenticated user must have Codespaces access to use this endpoint.
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `codespace` or `codespace:secrets` scope to use this
 * endpoint.
 */
class CodespacesRemoveRepositoryForSecretForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/secrets/{$this->secretName}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $secretName,
        protected int $repositoryId,
    ) {}
}
