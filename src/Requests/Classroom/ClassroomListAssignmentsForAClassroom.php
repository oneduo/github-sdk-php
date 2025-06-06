<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-assignments-for-a-classroom
 *
 * Lists GitHub Classroom assignments for a classroom. Assignments will only be returned if the current
 * user is an administrator of the GitHub Classroom.
 */
class ClassroomListAssignmentsForAClassroom extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/classrooms/{$this->classroomId}/assignments";
    }

    /**
     * @param  int  $classroomId  The unique identifier of the classroom.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $classroomId,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
