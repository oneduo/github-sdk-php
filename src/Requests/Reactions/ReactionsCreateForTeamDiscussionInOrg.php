<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-team-discussion-in-org
 *
 * Create a reaction to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion).
 *
 * A response with an
 * HTTP `200` status means that you already added the reaction type to this team discussion.
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `POST
 * /organizations/:org_id/team/:team_id/discussions/:discussion_number/reactions`.
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `write:discussion` scope to use this endpoint.
 */
class ReactionsCreateForTeamDiscussionInOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/reactions";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
    ) {}
}
