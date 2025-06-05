<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * api-insights/get-route-stats-by-actor
 *
 * Get API request count statistics for an actor broken down by route within a specified time frame.
 */
class ApiInsightsGetRouteStatsByActor extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/insights/api/route-stats/{$this->actorType}/{$this->actorId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $actorType  The type of the actor
     * @param  int  $actorId  The ID of the actor
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|array  $sort  The property to sort the results by.
     * @param  null|string  $apiRouteSubstring  Providing a substring will filter results where the API route contains the substring. This is a case-insensitive search.
     */
    public function __construct(
        protected string $org,
        protected string $actorType,
        protected int $actorId,
        protected string $minTimestamp,
        protected ?string $maxTimestamp = null,
        protected ?int $page = null,
        protected ?string $direction = null,
        protected ?array $sort = null,
        protected ?string $apiRouteSubstring = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'min_timestamp' => $this->minTimestamp,
            'max_timestamp' => $this->maxTimestamp,
            'page' => $this->page,
            'direction' => $this->direction,
            'sort' => $this->sort,
            'api_route_substring' => $this->apiRouteSubstring,
        ]);
    }
}
