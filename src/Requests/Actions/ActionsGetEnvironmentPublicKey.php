<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-environment-public-key
 *
 * Get the public key for an environment, which you need to encrypt environment
 * secrets. You need to
 * encrypt a secret before you can create or update secrets.
 *
 * Anyone with read access to the repository
 * can use this endpoint.
 *
 * If the repository is private, OAuth tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetEnvironmentPublicKey extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/secrets/public-key";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $environmentName,
    ) {}
}
