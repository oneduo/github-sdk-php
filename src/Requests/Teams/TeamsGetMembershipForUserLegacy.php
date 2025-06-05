<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-membership-for-user-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Get team
 * membership for a user](https://docs.github.com/rest/teams/members#get-team-membership-for-a-user)
 * endpoint.
 *
 * Team members will include the members of child teams.
 *
 * To get a user's membership with a
 * team, the team must be visible to the authenticated user.
 *
 * **Note:**
 * The response contains the
 * `state` of the membership and the member's `role`.
 *
 * The `role` for organization owners is set to
 * `maintainer`. For more information about `maintainer` roles, see [Create a
 * team](https://docs.github.com/rest/teams/teams#create-a-team).
 */
class TeamsGetMembershipForUserLegacy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/memberships/{$this->username}";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected int $teamId,
        protected string $username,
    ) {}
}
