<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-discussion-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Get a
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion) endpoint.
 *
 * Get a
 * specific discussion on a team's page.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * the `read:discussion` scope to use this endpoint.
 */
class TeamsGetDiscussionLegacy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}";
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
