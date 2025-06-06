<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-notifications-for-authenticated-user
 *
 * List all notifications for the current user, sorted by most recently updated.
 */
class ActivityListNotificationsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/notifications';
    }

    /**
     * @param  null|bool  $all  If `true`, show notifications marked as read.
     * @param  null|bool  $participating  If `true`, only shows notifications in which the user is directly participating or mentioned.
     * @param  null|string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $before  Only show notifications updated before the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?bool $all = null,
        protected ?bool $participating = null,
        protected ?string $since = null,
        protected ?string $before = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'all' => $this->all,
            'participating' => $this->participating,
            'since' => $this->since,
            'before' => $this->before,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
