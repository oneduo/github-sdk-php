<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-pages-build
 *
 * Gets information about a GitHub Pages build.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `repo` scope to use this endpoint.
 */
class ReposGetPagesBuild extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pages/builds/{$this->buildId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $buildId,
    ) {}
}
