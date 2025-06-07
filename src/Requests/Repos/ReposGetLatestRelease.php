<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-latest-release
 *
 * View the latest published full release for the repository.
 *
 * The latest release is the most recent
 * non-prerelease, non-draft release, sorted by the `created_at` attribute. The `created_at` attribute
 * is the date of the commit used for the release, and not the date when the release was drafted or
 * published.
 */
class ReposGetLatestRelease extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/releases/latest";
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
