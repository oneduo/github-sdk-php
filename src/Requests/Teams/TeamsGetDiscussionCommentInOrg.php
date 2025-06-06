<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-discussion-comment-in-org
 *
 * Get a specific comment on a team discussion.
 *
 * > [!NOTE]
 * > You can also specify a team by `org_id`
 * and `team_id` using the route `GET
 * /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}/comments/{comment_number}`.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `read:discussion` scope to use this
 * endpoint.
 */
class TeamsGetDiscussionCommentInOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/comments/{$this->commentNumber}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
        protected int $commentNumber,
    ) {}
}
