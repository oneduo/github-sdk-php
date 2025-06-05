<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-combined-status-for-ref
 *
 * Users with pull access in a repository can access a combined view of commit statuses for a given
 * ref. The ref can be a SHA, a branch name, or a tag name.
 *
 *
 * Additionally, a combined `state` is
 * returned. The `state` is one of:
 *
 * *   **failure** if any of the contexts report as `error` or
 * `failure`
 * *   **pending** if there are no statuses or a context is `pending`
 * *   **success** if the
 * latest status for all contexts is `success`
 */
class ReposGetCombinedStatusForRef extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->ref}/status";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
