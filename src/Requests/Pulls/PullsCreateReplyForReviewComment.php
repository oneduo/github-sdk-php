<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Pulls;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/create-reply-for-review-comment
 *
 * Creates a reply to a review comment for a pull request. For the `comment_id`, provide the ID of the
 * review comment you are replying to. This must be the ID of a _top-level review comment_, not a reply
 * to that comment. Replies to replies are not supported.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/using-the-rest-api/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and
 * "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 *
 * This endpoint
 * supports the following custom media types. For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github-commitcomment.raw+json`**: Returns the raw markdown body. Response will
 * include `body`. This is the default if you do not pass any specific media type.
 * -
 * **`application/vnd.github-commitcomment.text+json`**: Returns a text only representation of the
 * markdown body. Response will include `body_text`.
 * -
 * **`application/vnd.github-commitcomment.html+json`**: Returns HTML rendered from the body's
 * markdown. Response will include `body_html`.
 * - **`application/vnd.github-commitcomment.full+json`**:
 * Returns raw, text, and HTML representations. Response will include `body`, `body_text`, and
 * `body_html`.
 */
class PullsCreateReplyForReviewComment extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/comments/{$this->commentId}/replies";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
        protected int $commentId,
    ) {}
}
