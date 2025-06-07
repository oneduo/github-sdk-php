<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * api-insights/get-summary-stats-by-user
 *
 * Get overall statistics of API requests within the organization for a user.
 */
class ApiInsightsGetSummaryStatsByUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/insights/api/summary-stats/users/{$this->userId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $userId  The ID of the user to query for stats
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function __construct(
        protected string $org,
        protected string $userId,
        protected string $minTimestamp,
        protected ?string $maxTimestamp = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['min_timestamp' => $this->minTimestamp, 'max_timestamp' => $this->maxTimestamp]);
    }
}
