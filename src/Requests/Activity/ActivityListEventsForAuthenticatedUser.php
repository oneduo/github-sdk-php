<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-events-for-authenticated-user
 *
 * If you are authenticated as the given user, you will see your private events. Otherwise, you'll only
 * see public events. _Optional_: use the fine-grained token with following permission set to view
 * private events: "Events" user permissions (read).
 *
 * > [!NOTE]
 * > This API is not built to serve
 * real-time use cases. Depending on the time of day, event latency can be anywhere from 30s to 6h.
 */
class ActivityListEventsForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/users/{$this->username}/events";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $username,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
