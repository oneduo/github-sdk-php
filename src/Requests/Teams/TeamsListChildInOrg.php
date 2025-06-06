<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-child-in-org
 *
 * Lists the child teams of the team specified by `{team_slug}`.
 *
 * > [!NOTE]
 * > You can also specify a
 * team by `org_id` and `team_id` using the route `GET /organizations/{org_id}/team/{team_id}/teams`.
 */
class TeamsListChildInOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/teams";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
