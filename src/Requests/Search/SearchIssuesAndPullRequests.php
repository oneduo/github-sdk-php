<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * search/issues-and-pull-requests
 *
 * > [!WARNING]
 * > **Notice:** Search for issues and pull requests will be overridden by advanced search
 * on September 4, 2025.
 * > You can read more about this change on [the GitHub
 * blog](https://github.blog/changelog/2025-03-06-github-issues-projects-api-support-for-issues-advanced-search-and-more/).
 */
class SearchIssuesAndPullRequests extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/search/issues';
    }

    /**
     * @param  string  $q  The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching issues and pull requests](https://docs.github.com/search-github/searching-on-github/searching-issues-and-pull-requests)" for a detailed list of qualifiers.
     * @param  null|string  $sort  Sorts the results of your query by the number of `comments`, `reactions`, `reactions-+1`, `reactions--1`, `reactions-smile`, `reactions-thinking_face`, `reactions-heart`, `reactions-tada`, or `interactions`. You can also sort results by how recently the items were `created` or `updated`, Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
     * @param  null|string  $order  Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $advancedSearch  Set to `true` to use advanced search.
     *                                       Example: `http://api.github.com/search/issues?q={query}&advanced_search=true`
     */
    public function __construct(
        protected string $q,
        protected ?string $sort = null,
        protected ?string $order = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $advancedSearch = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'q' => $this->q,
            'sort' => $this->sort,
            'order' => $this->order,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'advanced_search' => $this->advancedSearch,
        ]);
    }
}
