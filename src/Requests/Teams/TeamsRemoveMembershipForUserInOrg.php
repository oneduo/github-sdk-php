<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-membership-for-user-in-org
 *
 * To remove a membership between a user and a team, the authenticated user must have 'admin'
 * permissions to the team or be an owner of the organization that the team is associated with.
 * Removing team membership does not delete the user, it just removes their membership from the
 * team.
 *
 * Team synchronization is available for organizations using GitHub Enterprise Cloud. For more
 * information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * > [!NOTE]
 * > When you have team synchronization set up for a team with your
 * organization's identity provider (IdP), you will see an error if you attempt to use the API for
 * making changes to the team's membership. If you have access to manage group membership in your IdP,
 * you can manage GitHub team membership through your identity provider, which automatically adds and
 * removes team members in an organization. For more information, see "[Synchronizing teams between
 * your identity provider and
 * GitHub](https://docs.github.com/articles/synchronizing-teams-between-your-identity-provider-and-github/)."
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `DELETE
 * /organizations/{org_id}/team/{team_id}/memberships/{username}`.
 */
class TeamsRemoveMembershipForUserInOrg extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
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
