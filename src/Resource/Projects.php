<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsAddCollaborator;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsCreateCard;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsCreateColumn;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsCreateForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsCreateForOrg;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsCreateForRepo;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsDelete;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsDeleteCard;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsDeleteColumn;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsGet;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsGetCard;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsGetColumn;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsGetPermissionForUser;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListCards;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListCollaborators;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListColumns;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListForOrg;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListForRepo;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsListForUser;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsMoveCard;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsMoveColumn;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsRemoveCollaborator;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsUpdate;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsUpdateCard;
use Oneduo\GitHubSdk\Requests\Projects\ProjectsUpdateColumn;
use Saloon\Http\Response;

class Projects extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $state  Indicates the state of the projects to return.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForOrg(string $org, ?string $state, ?int $page): Response {
        return $this->connector->send(new ProjectsListForOrg($org, $state, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function createForOrg(string $org): Response {
        return $this->connector->send(new ProjectsCreateForOrg($org));
    }

    /**
     * @param  int  $cardId  The unique identifier of the card.
     */
    public function getCard(int $cardId): Response {
        return $this->connector->send(new ProjectsGetCard($cardId));
    }

    /**
     * @param  int  $cardId  The unique identifier of the card.
     */
    public function deleteCard(int $cardId): Response {
        return $this->connector->send(new ProjectsDeleteCard($cardId));
    }

    /**
     * @param  int  $cardId  The unique identifier of the card.
     */
    public function updateCard(int $cardId): Response {
        return $this->connector->send(new ProjectsUpdateCard($cardId));
    }

    /**
     * @param  int  $cardId  The unique identifier of the card.
     */
    public function moveCard(int $cardId): Response {
        return $this->connector->send(new ProjectsMoveCard($cardId));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function getColumn(int $columnId): Response {
        return $this->connector->send(new ProjectsGetColumn($columnId));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function deleteColumn(int $columnId): Response {
        return $this->connector->send(new ProjectsDeleteColumn($columnId));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function updateColumn(int $columnId): Response {
        return $this->connector->send(new ProjectsUpdateColumn($columnId));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     * @param  string  $archivedState  Filters the project cards that are returned by the card's state.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCards(int $columnId, ?string $archivedState, ?int $page): Response {
        return $this->connector->send(new ProjectsListCards($columnId, $archivedState, $page));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function createCard(int $columnId): Response {
        return $this->connector->send(new ProjectsCreateCard($columnId));
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function moveColumn(int $columnId): Response {
        return $this->connector->send(new ProjectsMoveColumn($columnId));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function get(int $projectId): Response {
        return $this->connector->send(new ProjectsGet($projectId));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function delete(int $projectId): Response {
        return $this->connector->send(new ProjectsDelete($projectId));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function update(int $projectId): Response {
        return $this->connector->send(new ProjectsUpdate($projectId));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  string  $affiliation  Filters the collaborators by their affiliation. `outside` means outside collaborators of a project that are not a member of the project's organization. `direct` means collaborators with permissions to a project, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCollaborators(int $projectId, ?string $affiliation, ?int $page): Response {
        return $this->connector->send(new ProjectsListCollaborators($projectId, $affiliation, $page));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function addCollaborator(int $projectId, string $username): Response {
        return $this->connector->send(new ProjectsAddCollaborator($projectId, $username));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function removeCollaborator(int $projectId, string $username): Response {
        return $this->connector->send(new ProjectsRemoveCollaborator($projectId, $username));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getPermissionForUser(int $projectId, string $username): Response {
        return $this->connector->send(new ProjectsGetPermissionForUser($projectId, $username));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listColumns(int $projectId, ?int $page): Response {
        return $this->connector->send(new ProjectsListColumns($projectId, $page));
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function createColumn(int $projectId): Response {
        return $this->connector->send(new ProjectsCreateColumn($projectId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $state  Indicates the state of the projects to return.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForRepo(string $owner, string $repo, ?string $state, ?int $page): Response {
        return $this->connector->send(new ProjectsListForRepo($owner, $repo, $state, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createForRepo(string $owner, string $repo): Response {
        return $this->connector->send(new ProjectsCreateForRepo($owner, $repo));
    }

    public function createForAuthenticatedUser(): Response {
        return $this->connector->send(new ProjectsCreateForAuthenticatedUser);
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $state  Indicates the state of the projects to return.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForUser(string $username, ?string $state, ?int $page): Response {
        return $this->connector->send(new ProjectsListForUser($username, $state, $page));
    }
}
