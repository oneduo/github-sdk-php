<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/get-blob
 *
 * The `content` in the response will always be Base64 encoded.
 *
 * This endpoint supports the following
 * custom media types. For more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw blob data.
 * -
 * **`application/vnd.github+json`**: Returns a JSON representation of the blob with `content` as a
 * base64 encoded string. This is the default if no media type is specified.
 *
 * **Note** This endpoint
 * supports blobs up to 100 megabytes in size.
 */
class GitGetBlob extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/git/blobs/{$this->fileSha}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $fileSha,
    ) {}
}
