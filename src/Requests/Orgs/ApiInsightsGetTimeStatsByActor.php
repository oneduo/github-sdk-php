<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * api-insights/get-time-stats-by-actor
 *
 * Get the number of API requests and rate-limited requests made within an organization by a specific
 * actor within a specified time period.
 */
class ApiInsightsGetTimeStatsByActor extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/insights/api/time-stats/{$this->actorType}/{$this->actorId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $actorType  The type of the actor
     * @param  int  $actorId  The ID of the actor
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  string  $timestampIncrement  The increment of time used to breakdown the query results (5m, 10m, 1h, etc.)
     */
    public function __construct(
        protected string $org,
        protected string $actorType,
        protected int $actorId,
        protected string $minTimestamp,
        protected ?string $maxTimestamp,
        protected string $timestampIncrement,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'min_timestamp' => $this->minTimestamp,
            'max_timestamp' => $this->maxTimestamp,
            'timestamp_increment' => $this->timestampIncrement,
        ]);
    }
}
