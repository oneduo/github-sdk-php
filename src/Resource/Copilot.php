<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotAddCopilotSeatsForTeams;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotAddCopilotSeatsForUsers;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotCancelCopilotSeatAssignmentForTeams;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotCancelCopilotSeatAssignmentForUsers;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotCopilotMetricsForOrganization;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotCopilotMetricsForTeam;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotGetCopilotOrganizationDetails;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotGetCopilotSeatDetailsForUser;
use Oneduo\GitHubSdk\Requests\Copilot\CopilotListCopilotSeats;
use Saloon\Http\Response;

class Copilot extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function copilotGetCopilotOrganizationDetails(string $org): Response {
        return $this->connector->send(new CopilotGetCopilotOrganizationDetails($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function copilotListCopilotSeats(string $org, ?int $page): Response {
        return $this->connector->send(new CopilotListCopilotSeats($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function copilotAddCopilotSeatsForTeams(string $org): Response {
        return $this->connector->send(new CopilotAddCopilotSeatsForTeams($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function copilotCancelCopilotSeatAssignmentForTeams(string $org): Response {
        return $this->connector->send(new CopilotCancelCopilotSeatAssignmentForTeams($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function copilotAddCopilotSeatsForUsers(string $org): Response {
        return $this->connector->send(new CopilotAddCopilotSeatsForUsers($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function copilotCancelCopilotSeatAssignmentForUsers(string $org): Response {
        return $this->connector->send(new CopilotCancelCopilotSeatAssignmentForUsers($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $since  Show usage metrics since this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`). Maximum value is 28 days ago.
     * @param  string  $until  Show usage metrics until this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`) and should not preceed the `since` date if it is passed.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function copilotCopilotMetricsForOrganization(
        string $org,
        ?string $since,
        ?string $until,
        ?int $page,
    ): Response {
        return $this->connector->send(new CopilotCopilotMetricsForOrganization($org, $since, $until, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function copilotGetCopilotSeatDetailsForUser(string $org, string $username): Response {
        return $this->connector->send(new CopilotGetCopilotSeatDetailsForUser($org, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $since  Show usage metrics since this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`). Maximum value is 28 days ago.
     * @param  string  $until  Show usage metrics until this date. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format (`YYYY-MM-DDTHH:MM:SSZ`) and should not preceed the `since` date if it is passed.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function copilotCopilotMetricsForTeam(
        string $org,
        string $teamSlug,
        ?string $since,
        ?string $until,
        ?int $page,
    ): Response {
        return $this->connector->send(new CopilotCopilotMetricsForTeam($org, $teamSlug, $since, $until, $page));
    }
}
