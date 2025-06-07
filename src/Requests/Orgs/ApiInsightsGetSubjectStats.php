<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * api-insights/get-subject-stats
 *
 * Get API request statistics for all subjects within an organization within a specified time frame.
 * Subjects can be users or GitHub Apps.
 */
class ApiInsightsGetSubjectStats extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/insights/api/subject-stats";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $minTimestamp  The minimum timestamp to query for stats. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $maxTimestamp  The maximum timestamp to query for stats. Defaults to the time 30 days ago. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|array  $sort  The property to sort the results by.
     * @param  null|string  $subjectNameSubstring  Providing a substring will filter results where the subject name contains the substring. This is a case-insensitive search.
     */
    public function __construct(
        protected string $org,
        protected string $minTimestamp,
        protected ?string $maxTimestamp = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $direction = null,
        protected ?array $sort = null,
        protected ?string $subjectNameSubstring = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'min_timestamp' => $this->minTimestamp,
            'max_timestamp' => $this->maxTimestamp,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'direction' => $this->direction,
            'sort' => $this->sort,
            'subject_name_substring' => $this->subjectNameSubstring,
        ]);
    }
}
