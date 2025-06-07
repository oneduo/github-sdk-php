<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-team-discussion-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [`Create
 * reaction for a team
 * discussion`](https://docs.github.com/rest/reactions/reactions#create-reaction-for-a-team-discussion)
 * endpoint.
 *
 * Create a reaction to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion).
 *
 * A response with an
 * HTTP `200` status means that you already added the reaction type to this team discussion.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `write:discussion` scope to use this endpoint.
 */
class ReactionsCreateForTeamDiscussionLegacy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/reactions";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
    ) {}
}
