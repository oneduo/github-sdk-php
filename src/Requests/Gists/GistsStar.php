<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/star
 *
 * Note that you'll need to set `Content-Length` to zero when calling out to this endpoint. For more
 * information, see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 */
class GistsStar extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/gists/{$this->gistId}/star";
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function __construct(
        protected string $gistId,
    ) {}
}
