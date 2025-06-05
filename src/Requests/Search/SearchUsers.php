<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * search/users
 *
 * Find users via various criteria. This method returns up to 100 results [per
 * page](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api).
 *
 * When searching for
 * users, you can get text match metadata for the issue **login**, public **email**, and **name**
 * fields when you pass the `text-match` media type. For more details about highlighting search
 * results, see [Text match metadata](https://docs.github.com/rest/search/search#text-match-metadata).
 * For more details about how to receive highlighted search results, see [Text match
 * metadata](https://docs.github.com/rest/search/search#text-match-metadata).
 *
 * For example, if you're
 * looking for a list of popular users, you might try this
 * query:
 *
 * `q=tom+repos:%3E42+followers:%3E1000`
 *
 * This query searches for users with the name `tom`.
 * The results are restricted to users with more than 42 repositories and over 1,000 followers.
 *
 * This
 * endpoint does not accept authentication and will only include publicly visible users. As an
 * alternative, you can use the GraphQL API. The GraphQL API requires authentication and will return
 * private users, including Enterprise Managed Users (EMUs), that you are authorized to view. For more
 * information, see "[GraphQL Queries](https://docs.github.com/graphql/reference/queries#search)."
 */
class SearchUsers extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/search/users';
    }

    /**
     * @param  string  $q  The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching users](https://docs.github.com/search-github/searching-on-github/searching-users)" for a detailed list of qualifiers.
     * @param  null|string  $sort  Sorts the results of your query by number of `followers` or `repositories`, or when the person `joined` GitHub. Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
     * @param  null|string  $order  Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $q,
        protected ?string $sort = null,
        protected ?string $order = null,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['q' => $this->q, 'sort' => $this->sort, 'order' => $this->order, 'page' => $this->page]);
    }
}
