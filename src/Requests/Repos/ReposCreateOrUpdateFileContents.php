<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/create-or-update-file-contents
 *
 * Creates a new file or replaces an existing file in a repository.
 *
 * > [!NOTE]
 * > If you use this
 * endpoint and the "[Delete a file](https://docs.github.com/rest/repos/contents/#delete-a-file)"
 * endpoint in parallel, the concurrent requests will conflict and you will receive errors. You must
 * use these endpoints serially instead.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * the `repo` scope to use this endpoint. The `workflow` scope is also required in order to modify
 * files in the `.github/workflows` directory.
 */
class ReposCreateOrUpdateFileContents extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/contents/{$this->path}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $path  path parameter
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $path,
    ) {}
}
