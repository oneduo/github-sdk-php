<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-comments-for-commit
 *
 * Lists the comments for a specified commit.
 *
 * This endpoint supports the following custom media types.
 * For more information, see "[Media
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
class ReposListCommentsForCommit extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->commitSha}/comments";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $commitSha  The SHA of the commit.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $commitSha,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
