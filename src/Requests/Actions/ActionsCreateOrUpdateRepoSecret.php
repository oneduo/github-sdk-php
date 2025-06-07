<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/create-or-update-repo-secret
 *
 * Creates or updates a repository secret with an encrypted value. Encrypt your secret
 * using
 * [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * Authenticated users
 * must have collaborator access to a repository to create, update, or read secrets.
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsCreateOrUpdateRepoSecret extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $secretName,
    ) {}
}
