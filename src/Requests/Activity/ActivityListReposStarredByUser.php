<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-repos-starred-by-user
 *
 * Lists repositories a user has starred.
 *
 * This endpoint supports the following custom media types. For
 * more information, see "[Media
 * types](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types)."
 *
 * -
 * **`application/vnd.github.star+json`**: Includes a timestamp of when the star was created.
 */
class ActivityListReposStarredByUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/starred";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|string  $sort  The property to sort the results by. `created` means when the repository was starred. `updated` means when the repository was last pushed to.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $username,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
