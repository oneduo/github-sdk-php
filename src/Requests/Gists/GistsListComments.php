<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/list-comments
 *
 * Lists the comments on a gist.
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
class GistsListComments extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/gists/{$this->gistId}/comments";
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $gistId,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
