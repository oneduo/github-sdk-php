<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/get-an-assignment
 *
 * Gets a GitHub Classroom assignment. Assignment will only be returned if the current user is an
 * administrator of the GitHub Classroom for the assignment.
 */
class ClassroomGetAnAssignment extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/assignments/{$this->assignmentId}";
    }

    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     */
    public function __construct(
        protected int $assignmentId,
    ) {}
}
