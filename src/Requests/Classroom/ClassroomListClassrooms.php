<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-classrooms
 *
 * Lists GitHub Classroom classrooms for the current user. Classrooms will only be returned if the
 * current user is an administrator of one or more GitHub Classrooms.
 */
class ClassroomListClassrooms extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/classrooms';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
