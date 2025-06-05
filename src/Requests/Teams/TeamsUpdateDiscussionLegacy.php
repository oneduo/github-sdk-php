<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/update-discussion-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Update a
 * discussion](https://docs.github.com/rest/teams/discussions#update-a-discussion) endpoint.
 *
 * Edits the
 * title and body text of a discussion post. Only the parameters you provide are updated.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `write:discussion` scope to use this endpoint.
 */
class TeamsUpdateDiscussionLegacy extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
