<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-pending-invitations-in-org
 *
 * The return hash contains a `role` field which refers to the Organization Invitation role and will be
 * one of the following values: `direct_member`, `admin`, `billing_manager`, `hiring_manager`, or
 * `reinstate`. If the invitee is not a GitHub member, the `login` field in the return hash will be
 * `null`.
 *
 * > [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/invitations`.
 */
class TeamsListPendingInvitationsInOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/invitations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
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
