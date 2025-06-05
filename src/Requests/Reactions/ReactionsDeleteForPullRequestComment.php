<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/delete-for-pull-request-comment
 *
 * > [!NOTE]
 * > You can also specify a repository by `repository_id` using the route `DELETE
 * /repositories/:repository_id/pulls/comments/:comment_id/reactions/:reaction_id.`
 *
 * Delete a reaction
 * to a [pull request review
 * comment](https://docs.github.com/rest/pulls/comments#get-a-review-comment-for-a-pull-request).
 */
class ReactionsDeleteForPullRequestComment extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pulls/comments/{$this->commentId}/reactions/{$this->reactionId}";
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
