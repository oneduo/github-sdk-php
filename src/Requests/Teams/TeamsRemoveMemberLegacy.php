<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-member-legacy
 *
 * The "Remove team member" endpoint (described below) is closing down.
 *
 * We recommend using the [Remove
 * team membership for a
 * user](https://docs.github.com/rest/teams/members#remove-team-membership-for-a-user) endpoint
 * instead. It allows you to remove both active and pending memberships.
 *
 * Team synchronization is
 * available for organizations using GitHub Enterprise Cloud. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * To remove a team member, the authenticated user must have 'admin' permissions
 * to the team or be an owner of the org that the team is associated with. Removing a team member does
 * not delete the user, it just removes them from the team.
 *
 * > [!NOTE]
 * > When you have team
 * synchronization set up for a team with your organization's identity provider (IdP), you will see an
 * error if you attempt to use the API for making changes to the team's membership. If you have access
 * to manage group membership in your IdP, you can manage GitHub team membership through your identity
 * provider, which automatically adds and removes team members in an organization. For more
 * information, see "[Synchronizing teams between your identity provider and
 * GitHub](https://docs.github.com/articles/synchronizing-teams-between-your-identity-provider-and-github/)."
 */
class TeamsRemoveMemberLegacy extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/members/{$this->username}";
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
