<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/update-release-asset
 *
 * Users with push access to the repository can edit a release asset.
 */
class ReposUpdateReleaseAsset extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
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
