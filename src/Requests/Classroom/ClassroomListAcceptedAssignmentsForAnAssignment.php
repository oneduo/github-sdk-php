<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/list-accepted-assignments-for-an-assignment
 *
 * Lists any assignment repositories that have been created by students accepting a GitHub Classroom
 * assignment. Accepted assignments will only be returned if the current user is an administrator of
 * the GitHub Classroom for the assignment.
 */
class ClassroomListAcceptedAssignmentsForAnAssignment extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/assignments/{$this->assignmentId}/accepted_assignments";
    }

    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $assignmentId,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
