<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-pull-request-review-comment
 *
 * Create a reaction to a [pull request review
 * comment](https://docs.github.com/rest/pulls/comments#get-a-review-comment-for-a-pull-request). A
 * response with an HTTP `200` status means that you already added the reaction type to this pull
 * request review comment.
 */
class ReactionsCreateForPullRequestReviewComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/comments/{$this->commentId}/reactions";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
    ) {}
}
