<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-readme-in-directory
 *
 * Gets the README from a repository directory.
 *
 * This endpoint supports the following custom media
 * types. For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw file contents. This is the default if you do
 * not specify a media type.
 * - **`application/vnd.github.html+json`**: Returns the README in HTML.
 * Markup languages are rendered to HTML using GitHub's open-source [Markup
 * library](https://github.com/github/markup).
 */
class ReposGetReadmeInDirectory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/readme/{$this->dir}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $dir  The alternate path to look for a README file
     * @param  null|string  $ref  The name of the commit/branch/tag. Default: the repository’s default branch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $dir,
        protected ?string $ref = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['ref' => $this->ref]);
    }
}
