<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-file
 *
 * Deletes a file in a repository.
 *
 * You can provide an additional `committer` parameter, which is an
 * object containing information about the committer. Or, you can provide an `author` parameter, which
 * is an object containing information about the author.
 *
 * The `author` section is optional and is
 * filled in with the `committer` information if omitted. If the `committer` information is omitted,
 * the authenticated user's information is used.
 *
 * You must provide values for both `name` and `email`,
 * whether you choose to use `author` or `committer`. Otherwise, you'll receive a `422` status code.
 *
 * >
 * [!NOTE]
 * > If you use this endpoint and the "[Create or update file
 * contents](https://docs.github.com/rest/repos/contents/#create-or-update-file-contents)" endpoint in
 * parallel, the concurrent requests will conflict and you will receive errors. You must use these
 * endpoints serially instead.
 */
class ReposDeleteFile extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
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
