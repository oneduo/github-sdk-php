<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/list-for-ref
 *
 * Lists check runs for a commit ref. The `ref` can be a SHA, branch name, or a tag name.
 *
 * > [!NOTE]
 * >
 * The endpoints to manage checks only look for pushes in the repository where the check suite or check
 * run were created. Pushes to a branch in a forked repository are not detected and return an empty
 * `pull_requests` array.
 *
 * If there are more than 1000 check suites on a single git reference, this
 * endpoint will limit check runs to the 1000 most recent check suites. To iterate over all possible
 * check runs, use the [List check suites for a Git
 * reference](https://docs.github.com/rest/reference/checks#list-check-suites-for-a-git-reference)
 * endpoint and provide the `check_suite_id` parameter to the [List check runs in a check
 * suite](https://docs.github.com/rest/reference/checks#list-check-runs-in-a-check-suite)
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint on a private repository.
 */
class ChecksListForRef extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->ref}/check-runs";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  null|string  $checkName  Returns check runs with the specified `name`.
     * @param  null|string  $status  Returns check runs with the specified `status`.
     * @param  null|string  $filter  Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
        protected ?string $checkName = null,
        protected ?string $status = null,
        protected ?string $filter = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?int $appId = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'check_name' => $this->checkName,
            'status' => $this->status,
            'filter' => $this->filter,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'app_id' => $this->appId,
        ]);
    }
}
