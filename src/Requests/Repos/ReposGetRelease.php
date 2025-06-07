<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-release
 *
 * Gets a public release with the specified release ID.
 *
 * > [!NOTE]
 * > This returns an `upload_url` key
 * corresponding to the endpoint for uploading release assets. This key is a hypermedia resource. For
 * more information, see "[Getting started with the REST
 * API](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#hypermedia)."
 */
class ReposGetRelease extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/releases/{$this->releaseId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $releaseId,
    ) {}
}
