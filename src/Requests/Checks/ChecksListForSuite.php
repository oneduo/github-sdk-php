<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/list-for-suite
 *
 * Lists check runs for a check suite using its `id`.
 *
 * > [!NOTE]
 * > The endpoints to manage checks only
 * look for pushes in the repository where the check suite or check run were created. Pushes to a
 * branch in a forked repository are not detected and return an empty `pull_requests` array.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint on a private
 * repository.
 */
class ChecksListForSuite extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/check-suites/{$this->checkSuiteId}/check-runs";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkSuiteId  The unique identifier of the check suite.
     * @param  null|string  $checkName  Returns check runs with the specified `name`.
     * @param  null|string  $status  Returns check runs with the specified `status`.
     * @param  null|string  $filter  Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkSuiteId,
        protected ?string $checkName = null,
        protected ?string $status = null,
        protected ?string $filter = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['check_name' => $this->checkName, 'status' => $this->status, 'filter' => $this->filter, 'page' => $this->page]);
    }
}
