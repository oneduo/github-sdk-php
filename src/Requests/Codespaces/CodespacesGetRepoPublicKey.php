<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-repo-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to
 * encrypt a secret before you can
 * create or update secrets.
 *
 * If the repository is private, OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class CodespacesGetRepoPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces/secrets/public-key";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
