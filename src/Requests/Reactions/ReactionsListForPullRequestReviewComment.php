<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/list-for-pull-request-review-comment
 *
 * List the reactions to a [pull request review
 * comment](https://docs.github.com/rest/pulls/comments#get-a-review-comment-for-a-pull-request).
 */
class ReactionsListForPullRequestReviewComment extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pulls/comments/{$this->commentId}/reactions";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  null|string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a pull request review comment.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
        protected ?string $content = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['content' => $this->content, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
