<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/delete-for-issue-comment
 *
 * > [!NOTE]
 * > You can also specify a repository by `repository_id` using the route `DELETE delete
 * /repositories/:repository_id/issues/comments/:comment_id/reactions/:reaction_id`.
 *
 * Delete a reaction
 * to an [issue comment](https://docs.github.com/rest/issues/comments#get-an-issue-comment).
 */
class ReactionsDeleteForIssueComment extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/issues/comments/{$this->commentId}/reactions/{$this->reactionId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
        protected int $reactionId,
    ) {}
}
