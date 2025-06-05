<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * search/labels
 *
 * Find labels in a repository with names or descriptions that match search keywords. Returns up to 100
 * results [per page](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api).
 *
 * When
 * searching for labels, you can get text match metadata for the label **name** and **description**
 * fields when you pass the `text-match` media type. For more details about how to receive highlighted
 * search results, see [Text match
 * metadata](https://docs.github.com/rest/search/search#text-match-metadata).
 *
 * For example, if you want
 * to find labels in the `linguist` repository that match `bug`, `defect`, or `enhancement`. Your query
 * might look like this:
 *
 * `q=bug+defect+enhancement&repository_id=64778136`
 *
 * The labels that best match
 * the query appear first in the search results.
 */
class SearchLabels extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/search/labels';
    }

    /**
     * @param  int  $repositoryId  The id of the repository.
     * @param  string  $q  The search keywords. This endpoint does not accept qualifiers in the query. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query).
     * @param  null|string  $sort  Sorts the results of your query by when the label was `created` or `updated`. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
     * @param  null|string  $order  Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $repositoryId,
        protected string $q,
        protected ?string $sort = null,
        protected ?string $order = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'repository_id' => $this->repositoryId,
            'q' => $this->q,
            'sort' => $this->sort,
            'order' => $this->order,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
