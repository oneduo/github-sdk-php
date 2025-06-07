<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-deploy-key
 *
 * Deploy keys are immutable. If you need to update a key, remove the key and create a new one instead.
 */
class ReposDeleteDeployKey extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/keys/{$this->keyId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $keyId  The unique identifier of the key.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $keyId,
    ) {}
}
