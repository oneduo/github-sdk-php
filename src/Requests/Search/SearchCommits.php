<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * search/commits
 *
 * Find commits via various criteria on the default branch (usually `main`). This method returns up to
 * 100 results [per page](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api).
 *
 * When
 * searching for commits, you can get text match metadata for the **message** field when you provide
 * the `text-match` media type. For more details about how to receive highlighted search results, see
 * [Text match
 * metadata](https://docs.github.com/rest/search/search#text-match-metadata).
 *
 * For example,
 * if you want to find commits related to CSS in the
 * [octocat/Spoon-Knife](https://github.com/octocat/Spoon-Knife) repository. Your query would look
 * something like this:
 *
 * `q=repo:octocat/Spoon-Knife+css`
 */
class SearchCommits extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/search/commits';
    }

    /**
     * @param  string  $q  The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching commits](https://docs.github.com/search-github/searching-on-github/searching-commits)" for a detailed list of qualifiers.
     * @param  null|string  $sort  Sorts the results of your query by `author-date` or `committer-date`. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
     * @param  null|string  $order  Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $q,
        protected ?string $sort = null,
        protected ?string $order = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['q' => $this->q, 'sort' => $this->sort, 'order' => $this->order, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
