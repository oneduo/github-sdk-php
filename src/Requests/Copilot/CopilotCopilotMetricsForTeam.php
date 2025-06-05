<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/copilot-metrics-for-team
 *
 * Use this endpoint to see a breakdown of aggregated metrics for various GitHub Copilot features. See
 * the response schema tab for detailed metrics definitions.
 *
 * > [!NOTE]
 * > This endpoint will only
 * return results for a given day if the team had **five or more members with active Copilot licenses**
 * on that day, as evaluated at the end of that day.
 *
 * The response contains metrics for up to 28 days
 * prior. Metrics are processed once per day for the previous day,
 * and the response will only include
 * data up until yesterday. In order for an end user to be counted towards these metrics,
 * they must
 * have telemetry enabled in their IDE.
 *
 * To access this endpoint, the Copilot Metrics API access policy
 * must be enabled for the organization containing the team within GitHub settings.
 * Only organization
 * owners for the organization that contains this team and owners and billing managers of the parent
 * enterprise can view Copilot metrics for a team.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need either the `manage_billing:copilot`, `read:org`, or `read:enterprise` scopes to use
 * this endpoint.
 */
class CopilotCopilotMetricsForTeam extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/team/{$this->teamSlug}/copilot/metrics";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  null|string  $since  Show usage metrics since this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`). Maximum value is 28 days ago.
     * @param  null|string  $until  Show usage metrics until this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`) and should not preceed the `since` date if it is passed.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected ?string $since = null,
        protected ?string $until = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['since' => $this->since, 'until' => $this->until, 'page' => $this->page]);
    }
}
