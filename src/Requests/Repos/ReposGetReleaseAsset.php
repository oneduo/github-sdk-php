<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-release-asset
 *
 * To download the asset's binary content:
 *
 * - If within a browser, fetch the location specified in the
 * `browser_download_url` key provided in the response.
 * - Alternatively, set the `Accept` header of the
 * request to
 *
 * [`application/octet-stream`](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types).
 *
 *   The API will either redirect the client to the location, or stream it directly if possible.
 *   API
 * clients should handle both a `200` or `302` response.
 */
class ReposGetReleaseAsset extends Request
{
    protected Method $method = Method::GET;

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
