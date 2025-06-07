<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-membership-for-user-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Remove team
 * membership for a user](https://docs.github.com/rest/teams/members#remove-team-membership-for-a-user)
 * endpoint.
 *
 * Team synchronization is available for organizations using GitHub Enterprise Cloud. For
 * more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * To remove a membership between a user and a team, the authenticated user must
 * have 'admin' permissions to the team or be an owner of the organization that the team is associated
 * with. Removing team membership does not delete the user, it just removes their membership from the
 * team.
 *
 * > [!NOTE]
 * > When you have team synchronization set up for a team with your organization's
 * identity provider (IdP), you will see an error if you attempt to use the API for making changes to
 * the team's membership. If you have access to manage group membership in your IdP, you can manage
 * GitHub team membership through your identity provider, which automatically adds and removes team
 * members in an organization. For more information, see "[Synchronizing teams between your identity
 * provider and
 * GitHub](https://docs.github.com/articles/synchronizing-teams-between-your-identity-provider-and-github/)."
 */
class TeamsRemoveMembershipForUserLegacy extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
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
