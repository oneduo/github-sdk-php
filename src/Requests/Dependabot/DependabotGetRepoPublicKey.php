<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-repo-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to
 * encrypt a secret before you can
 * create or update secrets. Anyone with read access
 * to the repository can use this endpoint.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint if the
 * repository is private.
 */
class DependabotGetRepoPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/dependabot/secrets/public-key";
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
