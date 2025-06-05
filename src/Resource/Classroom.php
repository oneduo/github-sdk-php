<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomGetAClassroom;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomGetAnAssignment;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomGetAssignmentGrades;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomListAcceptedAssignmentsForAnAssignment;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomListAssignmentsForAClassroom;
use Oneduo\GitHubSdk\Requests\Classroom\ClassroomListClassrooms;
use Saloon\Http\Response;

class Classroom extends GitHubResource {
    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     */
    public function classroomGetAnAssignment(int $assignmentId): Response {
        return $this->connector->send(new ClassroomGetAnAssignment($assignmentId));
    }

    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function classroomListAcceptedAssignmentsForAnAssignment(int $assignmentId, ?int $page): Response {
        return $this->connector->send(new ClassroomListAcceptedAssignmentsForAnAssignment($assignmentId, $page));
    }

    /**
     * @param  int  $assignmentId  The unique identifier of the classroom assignment.
     */
    public function classroomGetAssignmentGrades(int $assignmentId): Response {
        return $this->connector->send(new ClassroomGetAssignmentGrades($assignmentId));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function classroomListClassrooms(?int $page): Response {
        return $this->connector->send(new ClassroomListClassrooms($page));
    }

    /**
     * @param  int  $classroomId  The unique identifier of the classroom.
     */
    public function classroomGetAclassroom(int $classroomId): Response {
        return $this->connector->send(new ClassroomGetAClassroom($classroomId));
    }

    /**
     * @param  int  $classroomId  The unique identifier of the classroom.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function classroomListAssignmentsForAclassroom(int $classroomId, ?int $page): Response {
        return $this->connector->send(new ClassroomListAssignmentsForAClassroom($classroomId, $page));
    }
}
