<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-membership-for-user-in-org
 *
 * Team members will include the members of child teams.
 *
 * To get a user's membership with a team, the
 * team must be visible to the authenticated user.
 *
 * > [!NOTE]
 * > You can also specify a team by `org_id`
 * and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/memberships/{username}`.
 *
 * > [!NOTE]
 * > The response contains
 * the `state` of the membership and the member's `role`.
 *
 * The `role` for organization owners is set to
 * `maintainer`. For more information about `maintainer` roles, see [Create a
 * team](https://docs.github.com/rest/teams/teams#create-a-team).
 */
class TeamsGetMembershipForUserInOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/memberships/{$this->username}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected string $username,
    ) {}
}
