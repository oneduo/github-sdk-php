<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-member-legacy
 *
 * The "Get team member" endpoint (described below) is closing down.
 *
 * We recommend using the [Get team
 * membership for a user](https://docs.github.com/rest/teams/members#get-team-membership-for-a-user)
 * endpoint instead. It allows you to get both active and pending memberships.
 *
 * To list members in a
 * team, the team must be visible to the authenticated user.
 */
class TeamsGetMemberLegacy extends Request {
    protected Method $method = Method::GET;

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
