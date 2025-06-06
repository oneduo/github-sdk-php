<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Pulls;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/list
 *
 * Lists pull requests in a specified repository.
 *
 * Draft pull requests are available in public
 * repositories with GitHub
 * Free and GitHub Free for organizations, GitHub Pro, and legacy
 * per-repository billing
 * plans, and in public and private repositories with GitHub Team and GitHub
 * Enterprise
 * Cloud. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products)
 * in the GitHub
 * Help documentation.
 *
 * This endpoint supports the following custom media types. For more information,
 * see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.raw+json`**: Returns the raw markdown body. Response will include `body`.
 * This is the default if you do not pass any specific media type.
 * -
 * **`application/vnd.github.text+json`**: Returns a text only representation of the markdown body.
 * Response will include `body_text`.
 * - **`application/vnd.github.html+json`**: Returns HTML rendered
 * from the body's markdown. Response will include `body_html`.
 * -
 * **`application/vnd.github.full+json`**: Returns raw, text, and HTML representations. Response will
 * include `body`, `body_text`, and `body_html`.
 */
class PullsList extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pulls";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $state  Either `open`, `closed`, or `all` to filter by state.
     * @param  null|string  $head  Filter pulls by head user or head organization and branch name in the format of `user:ref-name` or `organization:ref-name`. For example: `github:new-script-format` or `octocat:test-branch`.
     * @param  null|string  $base  Filter pulls by base branch name. Example: `gh-pages`.
     * @param  null|string  $sort  What to sort results by. `popularity` will sort by the number of comments. `long-running` will sort by date created and will limit the results to pull requests that have been open for more than a month and have had activity within the past month.
     * @param  null|string  $direction  The direction of the sort. Default: `desc` when sort is `created` or sort is not specified, otherwise `asc`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $state = null,
        protected ?string $head = null,
        protected ?string $base = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'state' => $this->state,
            'head' => $this->head,
            'base' => $this->base,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
