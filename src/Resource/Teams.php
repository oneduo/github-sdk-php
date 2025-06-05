<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddMemberLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateMembershipForUserInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateMembershipForUserLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateProjectPermissionsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateProjectPermissionsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateRepoPermissionsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsAddOrUpdateRepoPermissionsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCheckPermissionsForProjectInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCheckPermissionsForProjectLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCheckPermissionsForRepoInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCheckPermissionsForRepoLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCreate;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCreateDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCreateDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCreateDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsCreateDiscussionLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteDiscussionLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsDeleteLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetByName;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetDiscussionLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetMemberLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetMembershipForUserInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsGetMembershipForUserLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsList;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListChildInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListChildLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListDiscussionCommentsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListDiscussionCommentsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListDiscussionsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListDiscussionsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListMembersInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListMembersLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListPendingInvitationsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListPendingInvitationsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListProjectsInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListProjectsLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListReposInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsListReposLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveMemberLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveMembershipForUserInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveMembershipForUserLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveProjectInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveProjectLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveRepoInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsRemoveRepoLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateDiscussionLegacy;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateInOrg;
use Oneduo\GitHubSdk\Requests\Teams\TeamsUpdateLegacy;
use Saloon\Http\Response;

class Teams extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function list(string $org, ?int $page): Response {
        return $this->connector->send(new TeamsList($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function create(string $org): Response {
        return $this->connector->send(new TeamsCreate($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function getByName(string $org, string $teamSlug): Response {
        return $this->connector->send(new TeamsGetByName($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function deleteInOrg(string $org, string $teamSlug): Response {
        return $this->connector->send(new TeamsDeleteInOrg($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function updateInOrg(string $org, string $teamSlug): Response {
        return $this->connector->send(new TeamsUpdateInOrg($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $pinned  Pinned discussions only filter
     */
    public function listDiscussionsInOrg(
        string $org,
        string $teamSlug,
        ?string $direction,
        ?int $page,
        ?string $pinned,
    ): Response {
        return $this->connector->send(new TeamsListDiscussionsInOrg($org, $teamSlug, $direction, $page, $pinned));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function createDiscussionInOrg(string $org, string $teamSlug): Response {
        return $this->connector->send(new TeamsCreateDiscussionInOrg($org, $teamSlug));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function getDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response {
        return $this->connector->send(new TeamsGetDiscussionInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function deleteDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response {
        return $this->connector->send(new TeamsDeleteDiscussionInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function updateDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response {
        return $this->connector->send(new TeamsUpdateDiscussionInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDiscussionCommentsInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new TeamsListDiscussionCommentsInOrg($org, $teamSlug, $discussionNumber, $direction, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function createDiscussionCommentInOrg(string $org, string $teamSlug, int $discussionNumber): Response {
        return $this->connector->send(new TeamsCreateDiscussionCommentInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function getDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new TeamsGetDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function deleteDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new TeamsDeleteDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function updateDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new TeamsUpdateDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPendingInvitationsInOrg(string $org, string $teamSlug, ?int $page): Response {
        return $this->connector->send(new TeamsListPendingInvitationsInOrg($org, $teamSlug, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $role  Filters members returned by their role in the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listMembersInOrg(string $org, string $teamSlug, ?string $role, ?int $page): Response {
        return $this->connector->send(new TeamsListMembersInOrg($org, $teamSlug, $role, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response {
        return $this->connector->send(new TeamsGetMembershipForUserInOrg($org, $teamSlug, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function addOrUpdateMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response {
        return $this->connector->send(new TeamsAddOrUpdateMembershipForUserInOrg($org, $teamSlug, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeMembershipForUserInOrg(string $org, string $teamSlug, string $username): Response {
        return $this->connector->send(new TeamsRemoveMembershipForUserInOrg($org, $teamSlug, $username));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listProjectsInOrg(string $org, string $teamSlug, ?int $page): Response {
        return $this->connector->send(new TeamsListProjectsInOrg($org, $teamSlug, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function checkPermissionsForProjectInOrg(string $org, string $teamSlug, int $projectId): Response {
        return $this->connector->send(new TeamsCheckPermissionsForProjectInOrg($org, $teamSlug, $projectId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function addOrUpdateProjectPermissionsInOrg(string $org, string $teamSlug, int $projectId): Response {
        return $this->connector->send(new TeamsAddOrUpdateProjectPermissionsInOrg($org, $teamSlug, $projectId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function removeProjectInOrg(string $org, string $teamSlug, int $projectId): Response {
        return $this->connector->send(new TeamsRemoveProjectInOrg($org, $teamSlug, $projectId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listReposInOrg(string $org, string $teamSlug, ?int $page): Response {
        return $this->connector->send(new TeamsListReposInOrg($org, $teamSlug, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function checkPermissionsForRepoInOrg(
        string $org,
        string $teamSlug,
        string $owner,
        string $repo,
    ): Response {
        return $this->connector->send(new TeamsCheckPermissionsForRepoInOrg($org, $teamSlug, $owner, $repo));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function addOrUpdateRepoPermissionsInOrg(
        string $org,
        string $teamSlug,
        string $owner,
        string $repo,
    ): Response {
        return $this->connector->send(new TeamsAddOrUpdateRepoPermissionsInOrg($org, $teamSlug, $owner, $repo));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function removeRepoInOrg(string $org, string $teamSlug, string $owner, string $repo): Response {
        return $this->connector->send(new TeamsRemoveRepoInOrg($org, $teamSlug, $owner, $repo));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listChildInOrg(string $org, string $teamSlug, ?int $page): Response {
        return $this->connector->send(new TeamsListChildInOrg($org, $teamSlug, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function getLegacy(int $teamId): Response {
        return $this->connector->send(new TeamsGetLegacy($teamId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function deleteLegacy(int $teamId): Response {
        return $this->connector->send(new TeamsDeleteLegacy($teamId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function updateLegacy(int $teamId): Response {
        return $this->connector->send(new TeamsUpdateLegacy($teamId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDiscussionsLegacy(int $teamId, ?string $direction, ?int $page): Response {
        return $this->connector->send(new TeamsListDiscussionsLegacy($teamId, $direction, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function createDiscussionLegacy(int $teamId): Response {
        return $this->connector->send(new TeamsCreateDiscussionLegacy($teamId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function getDiscussionLegacy(int $teamId, int $discussionNumber): Response {
        return $this->connector->send(new TeamsGetDiscussionLegacy($teamId, $discussionNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function deleteDiscussionLegacy(int $teamId, int $discussionNumber): Response {
        return $this->connector->send(new TeamsDeleteDiscussionLegacy($teamId, $discussionNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function updateDiscussionLegacy(int $teamId, int $discussionNumber): Response {
        return $this->connector->send(new TeamsUpdateDiscussionLegacy($teamId, $discussionNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listDiscussionCommentsLegacy(
        int $teamId,
        int $discussionNumber,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new TeamsListDiscussionCommentsLegacy($teamId, $discussionNumber, $direction, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function createDiscussionCommentLegacy(int $teamId, int $discussionNumber): Response {
        return $this->connector->send(new TeamsCreateDiscussionCommentLegacy($teamId, $discussionNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function getDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response {
        return $this->connector->send(new TeamsGetDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function deleteDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response {
        return $this->connector->send(new TeamsDeleteDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function updateDiscussionCommentLegacy(int $teamId, int $discussionNumber, int $commentNumber): Response {
        return $this->connector->send(new TeamsUpdateDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPendingInvitationsLegacy(int $teamId, ?int $page): Response {
        return $this->connector->send(new TeamsListPendingInvitationsLegacy($teamId, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $role  Filters members returned by their role in the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listMembersLegacy(int $teamId, ?string $role, ?int $page): Response {
        return $this->connector->send(new TeamsListMembersLegacy($teamId, $role, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getMemberLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsGetMemberLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function addMemberLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsAddMemberLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeMemberLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsRemoveMemberLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getMembershipForUserLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsGetMembershipForUserLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function addOrUpdateMembershipForUserLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsAddOrUpdateMembershipForUserLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeMembershipForUserLegacy(int $teamId, string $username): Response {
        return $this->connector->send(new TeamsRemoveMembershipForUserLegacy($teamId, $username));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listProjectsLegacy(int $teamId, ?int $page): Response {
        return $this->connector->send(new TeamsListProjectsLegacy($teamId, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function checkPermissionsForProjectLegacy(int $teamId, int $projectId): Response {
        return $this->connector->send(new TeamsCheckPermissionsForProjectLegacy($teamId, $projectId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function addOrUpdateProjectPermissionsLegacy(int $teamId, int $projectId): Response {
        return $this->connector->send(new TeamsAddOrUpdateProjectPermissionsLegacy($teamId, $projectId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function removeProjectLegacy(int $teamId, int $projectId): Response {
        return $this->connector->send(new TeamsRemoveProjectLegacy($teamId, $projectId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listReposLegacy(int $teamId, ?int $page): Response {
        return $this->connector->send(new TeamsListReposLegacy($teamId, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function checkPermissionsForRepoLegacy(int $teamId, string $owner, string $repo): Response {
        return $this->connector->send(new TeamsCheckPermissionsForRepoLegacy($teamId, $owner, $repo));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function addOrUpdateRepoPermissionsLegacy(int $teamId, string $owner, string $repo): Response {
        return $this->connector->send(new TeamsAddOrUpdateRepoPermissionsLegacy($teamId, $owner, $repo));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function removeRepoLegacy(int $teamId, string $owner, string $repo): Response {
        return $this->connector->send(new TeamsRemoveRepoLegacy($teamId, $owner, $repo));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listChildLegacy(int $teamId, ?int $page): Response {
        return $this->connector->send(new TeamsListChildLegacy($teamId, $page));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new TeamsListForAuthenticatedUser($page));
    }
}
