<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-release-asset
 */
class ReposDeleteReleaseAsset extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/releases/assets/{$this->assetId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $assetId  The unique identifier of the asset.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $assetId,
    ) {}
}
