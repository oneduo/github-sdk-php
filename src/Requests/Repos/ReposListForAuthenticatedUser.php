<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-for-authenticated-user
 *
 * Lists repositories that the authenticated user has explicit permission (`:read`, `:write`, or
 * `:admin`) to access.
 *
 * The authenticated user has explicit permission to access repositories they
 * own, repositories where they are a collaborator, and repositories that they can access through an
 * organization membership.
 */
class ReposListForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/repos';
    }

    /**
     * @param  null|string  $visibility  Limit results to repositories with the specified visibility.
     * @param  null|string  $affiliation  Comma-separated list of values. Can include:
     *                                    * `owner`: Repositories that are owned by the authenticated user.
     *                                    * `collaborator`: Repositories that the user has been added to as a collaborator.
     *                                    * `organization_member`: Repositories that the user has access to through being a member of an organization. This includes every repository on every team that the user is on.
     * @param  null|string  $type  Limit results to repositories of the specified type. Will cause a `422` error if used in the same request as **visibility** or **affiliation**.
     * @param  null|string  $sort  The property to sort the results by.
     * @param  null|string  $direction  The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $since  Only show repositories updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $before  Only show repositories updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function __construct(
        protected ?string $visibility = null,
        protected ?string $affiliation = null,
        protected ?string $type = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $since = null,
        protected ?string $before = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'visibility' => $this->visibility,
            'affiliation' => $this->affiliation,
            'type' => $this->type,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'since' => $this->since,
            'before' => $this->before,
        ]);
    }
}
