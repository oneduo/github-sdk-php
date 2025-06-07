<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/update-discussion-comment-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Update a
 * discussion
 * comment](https://docs.github.com/rest/teams/discussion-comments#update-a-discussion-comment)
 * endpoint.
 *
 * Edits the body text of a discussion comment.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `write:discussion` scope to use this endpoint.
 */
class TeamsUpdateDiscussionCommentLegacy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/comments/{$this->commentNumber}";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
        protected int $commentNumber,
    ) {}
}
