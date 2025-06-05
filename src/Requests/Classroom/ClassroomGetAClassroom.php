<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Classroom;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * classroom/get-a-classroom
 *
 * Gets a GitHub Classroom classroom for the current user. Classroom will only be returned if the
 * current user is an administrator of the GitHub Classroom.
 */
class ClassroomGetAClassroom extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/classrooms/{$this->classroomId}";
    }

    /**
     * @param  int  $classroomId  The unique identifier of the classroom.
     */
    public function __construct(
        protected int $classroomId,
    ) {}
}
