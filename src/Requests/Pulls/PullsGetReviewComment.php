<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Pulls;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/get-review-comment
 *
 * Provides details for a specified review comment.
 *
 * This endpoint supports the following custom media
 * types. For more information, see "[Media
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
class PullsGetReviewComment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/comments/{$this->commentId}";
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
