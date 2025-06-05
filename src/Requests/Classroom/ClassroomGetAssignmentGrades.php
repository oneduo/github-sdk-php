<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/get-assignment-grades
 *
 * Gets grades for a GitHub Classroom assignment. Grades will only be returned if the current user is
 * an administrator of the GitHub Classroom for the assignment.
 */
class ClassroomGetAssignmentGrades extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/assignments/{$this->assignmentId}/grades";
    }

    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     */
    public function __construct(
        protected int $assignmentId,
    ) {}
}
