<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Licenses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * licenses/get-for-repo
 *
 * This method returns the contents of the repository's license file, if one is detected.
 *
 * This
 * endpoint supports the following custom media types. For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw contents of the license.
 * -
 * **`application/vnd.github.html+json`**: Returns the license contents in HTML. Markup languages are
 * rendered to HTML using GitHub's open-source [Markup library](https://github.com/github/markup).
 */
class LicensesGetForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/license";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $ref = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['ref' => $this->ref]);
    }
}
