<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-member-legacy
 *
 * The "Add team member" endpoint (described below) is closing down.
 *
 * We recommend using the [Add or
 * update team membership for a
 * user](https://docs.github.com/rest/teams/members#add-or-update-team-membership-for-a-user) endpoint
 * instead. It allows you to invite new organization members to your teams.
 *
 * Team synchronization is
 * available for organizations using GitHub Enterprise Cloud. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * To add someone to a team, the authenticated user must be an organization owner
 * or a team maintainer in the team they're changing. The person being added to the team must be a
 * member of the team's organization.
 *
 * > [!NOTE]
 * > When you have team synchronization set up for a team
 * with your organization's identity provider (IdP), you will see an error if you attempt to use the
 * API for making changes to the team's membership. If you have access to manage group membership in
 * your IdP, you can manage GitHub team membership through your identity provider, which automatically
 * adds and removes team members in an organization. For more information, see "[Synchronizing teams
 * between your identity provider and
 * GitHub](https://docs.github.com/articles/synchronizing-teams-between-your-identity-provider-and-github/)."
 *
 * Note
 * that you'll need to set `Content-Length` to zero when calling out to this endpoint. For more
 * information, see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 */
class TeamsAddMemberLegacy extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
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
