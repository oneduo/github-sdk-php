<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/get-ref
 *
 * Returns a single reference from your Git database. The `:ref` in the URL must be formatted as
 * `heads/<branch name>` for branches and `tags/<tag name>` for tags. If the `:ref` doesn't match an
 * existing ref, a `404` is returned.
 *
 * > [!NOTE]
 * > You need to explicitly [request a pull
 * request](https://docs.github.com/rest/pulls/pulls#get-a-pull-request) to trigger a test merge
 * commit, which checks the mergeability of pull requests. For more information, see "[Checking
 * mergeability of pull
 * requests](https://docs.github.com/rest/guides/getting-started-with-the-git-database-api#checking-mergeability-of-pull-requests)".
 */
class GitGetRef extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/git/ref/{$this->ref}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The Git reference. For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
    ) {}
}
