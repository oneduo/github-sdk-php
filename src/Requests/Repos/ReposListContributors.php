<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-contributors
 *
 * Lists contributors to the specified repository and sorts them by the number of commits per
 * contributor in descending order. This endpoint may return information that is a few hours old
 * because the GitHub REST API caches contributor data to improve performance.
 *
 * GitHub identifies
 * contributors by author email address. This endpoint groups contribution counts by GitHub user, which
 * includes all associated email addresses. To improve performance, only the first 500 author email
 * addresses in the repository link to GitHub users. The rest will appear as anonymous contributors
 * without associated GitHub user information.
 */
class ReposListContributors extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/contributors";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $anon  Set to `1` or `true` to include anonymous contributors in results.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $anon = null,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['anon' => $this->anon, 'page' => $this->page]);
    }
}
