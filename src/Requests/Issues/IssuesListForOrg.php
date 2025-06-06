<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-for-org
 *
 * List issues in an organization assigned to the authenticated user.
 *
 * > [!NOTE]
 * > GitHub's REST API
 * considers every pull request an issue, but not every issue is a pull request. For this reason,
 * "Issues" endpoints may return both issues and pull requests in the response. You can identify pull
 * requests by the `pull_request` key. Be aware that the `id` of a pull request returned from "Issues"
 * endpoints will be an _issue id_. To find out the pull request id, use the "[List pull
 * requests](https://docs.github.com/rest/pulls/pulls#list-pull-requests)" endpoint.
 *
 * This endpoint
 * supports the following custom media types. For more information, see "[Media
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
class IssuesListForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/issues";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $filter  Indicates which sorts of issues to return. `assigned` means issues assigned to you. `created` means issues created by you. `mentioned` means issues mentioning you. `subscribed` means issues you're subscribed to updates for. `all` or `repos` means all issues you can see, regardless of participation or creation.
     * @param  null|string  $state  Indicates the state of the issues to return.
     * @param  null|string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  null|string  $type  Can be the name of an issue type.
     * @param  null|string  $sort  What to sort results by.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $filter = null,
        protected ?string $state = null,
        protected ?string $labels = null,
        protected ?string $type = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $since = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'filter' => $this->filter,
            'state' => $this->state,
            'labels' => $this->labels,
            'type' => $this->type,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'since' => $this->since,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
