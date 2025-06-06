<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-workflow-runs-for-repo
 *
 * Lists all workflow runs for a repository. You can use parameters to narrow the list of results. For
 * more information about using parameters, see
 * [Parameters](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#parameters).
 *
 * Anyone
 * with read access to the repository can use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint with a private repository.
 *
 * This
 * endpoint will return up to 1,000 results for each search when using the following parameters:
 * `actor`, `branch`, `check_suite_id`, `created`, `event`, `head_sha`, `status`.
 */
class ActionsListWorkflowRunsForRepo extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $actor  Returns someone's workflow runs. Use the login for the user who created the `push` associated with the check suite or workflow run.
     * @param  null|string  $branch  Returns workflow runs associated with a branch. Use the name of the branch of the `push`.
     * @param  null|string  $event  Returns workflow run triggered by the event you specify. For example, `push`, `pull_request` or `issue`. For more information, see "[Events that trigger workflows](https://docs.github.com/actions/automating-your-workflow-with-github-actions/events-that-trigger-workflows)."
     * @param  null|string  $status  Returns workflow runs with the check run `status` or `conclusion` that you specify. For example, a conclusion can be `success` or a status can be `in_progress`. Only GitHub Actions can set a status of `waiting`, `pending`, or `requested`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $created  Returns workflow runs created within the given date-time range. For more information on the syntax, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  null|bool  $excludePullRequests  If `true` pull requests are omitted from the response (empty array).
     * @param  null|int  $checkSuiteId  Returns workflow runs with the `check_suite_id` that you specify.
     * @param  null|string  $headSha  Only returns workflow runs that are associated with the specified `head_sha`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $actor = null,
        protected ?string $branch = null,
        protected ?string $event = null,
        protected ?string $status = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $created = null,
        protected ?bool $excludePullRequests = null,
        protected ?int $checkSuiteId = null,
        protected ?string $headSha = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'actor' => $this->actor,
            'branch' => $this->branch,
            'event' => $this->event,
            'status' => $this->status,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'created' => $this->created,
            'exclude_pull_requests' => $this->excludePullRequests,
            'check_suite_id' => $this->checkSuiteId,
            'head_sha' => $this->headSha,
        ]);
    }
}
