<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/update-comment
 *
 * Updates a comment on a gist.
 *
 * This endpoint supports the following custom media types. For more
 * information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw markdown. This is the default if you do not
 * pass any specific media type.
 * - **`application/vnd.github.base64+json`**: Returns the base64-encoded
 * contents. This can be useful if your gist contains any invalid UTF-8 sequences.
 */
class GistsUpdateComment extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return "/gists/{$this->gistId}/comments/{$this->commentId}";
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function __construct(
        protected string $gistId,
        protected int $commentId,
    ) {}
}
