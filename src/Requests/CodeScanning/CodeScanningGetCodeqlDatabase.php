<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-codeql-database
 *
 * Gets a CodeQL database for a language in a repository.
 *
 * By default this endpoint returns JSON
 * metadata about the CodeQL database. To
 * download the CodeQL database binary content, set the `Accept`
 * header of the request
 * to
 * [`application/zip`](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types),
 * and make sure
 * your HTTP client is configured to follow redirects or use the `Location` header
 * to
 * make a second request to get the redirect URL.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint with private or public repositories, or the
 * `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningGetCodeqlDatabase extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/databases/{$this->language}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $language  The language of the CodeQL database.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $language,
    ) {}
}
