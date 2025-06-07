<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/update-information-about-pages-site
 *
 * Updates information for a GitHub Pages site. For more information, see "[About GitHub
 * Pages](/github/working-with-github-pages/about-github-pages).
 *
 * The authenticated user must be a
 * repository administrator, maintainer, or have the 'manage GitHub Pages settings' permission.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ReposUpdateInformationAboutPagesSite extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pages";
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
