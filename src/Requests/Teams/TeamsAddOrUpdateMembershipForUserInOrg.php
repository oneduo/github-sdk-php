<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-membership-for-user-in-org
 *
 * Adds an organization member to a team. An authenticated organization owner or team maintainer can
 * add organization members to a team.
 *
 * Team synchronization is available for organizations using
 * GitHub Enterprise Cloud. For more information, see [GitHub's
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
 * An
 * organization owner can add someone who is not part of the team's organization to a team. When an
 * organization owner adds someone to a team who is not an organization member, this endpoint will send
 * an invitation to the person via email. This newly-created membership will be in the "pending" state
 * until the person accepts the invitation, at which point the membership will transition to the
 * "active" state and the user will be added as a member of the team.
 *
 * If the user is already a member
 * of the team, this endpoint will update the role of the team member's role. To update the membership
 * of a team member, the authenticated user must be an organization owner or a team maintainer.
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `PUT
 * /organizations/{org_id}/team/{team_id}/memberships/{username}`.
 */
class TeamsAddOrUpdateMembershipForUserInOrg extends Request
{
    protected Method $method = Method::PUT;

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
