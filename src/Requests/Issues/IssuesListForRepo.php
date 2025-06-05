<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-for-repo
 *
 * List issues in a repository. Only open issues will be listed.
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
class IssuesListForRepo extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/issues";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $milestone  If an `integer` is passed, it should refer to a milestone by its `number` field. If the string `*` is passed, issues with any milestone are accepted. If the string `none` is passed, issues without milestones are returned.
     * @param  null|string  $state  Indicates the state of the issues to return.
     * @param  null|string  $assignee  Can be the name of a user. Pass in `none` for issues with no assigned user, and `*` for issues assigned to any user.
     * @param  null|string  $type  Can be the name of an issue type. If the string `*` is passed, issues with any type are accepted. If the string `none` is passed, issues without type are returned.
     * @param  null|string  $creator  The user that created the issue.
     * @param  null|string  $mentioned  A user that's mentioned in the issue.
     * @param  null|string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  null|string  $sort  What to sort results by.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $milestone = null,
        protected ?string $state = null,
        protected ?string $assignee = null,
        protected ?string $type = null,
        protected ?string $creator = null,
        protected ?string $mentioned = null,
        protected ?string $labels = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $since = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'milestone' => $this->milestone,
            'state' => $this->state,
            'assignee' => $this->assignee,
            'type' => $this->type,
            'creator' => $this->creator,
            'mentioned' => $this->mentioned,
            'labels' => $this->labels,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'since' => $this->since,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
