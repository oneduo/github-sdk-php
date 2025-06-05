<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsCancelImport;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsDeleteArchiveForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsDeleteArchiveForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsDownloadArchiveForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetArchiveForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetCommitAuthors;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetImportStatus;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetLargeFiles;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetStatusForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsGetStatusForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsListForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsListReposForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsListReposForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsMapCommitAuthor;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsSetLfsPreference;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsStartForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsStartForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsStartImport;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsUnlockRepoForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsUnlockRepoForOrg;
use Oneduo\GitHubSdk\Requests\Migrations\MigrationsUpdateImport;
use Saloon\Http\Response;

class Migrations extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  array  $exclude  Exclude attributes from the API response to improve performance
     */
    public function migrationsListForOrg(string $org, ?int $page, ?array $exclude): Response {
        return $this->connector->send(new MigrationsListForOrg($org, $page, $exclude));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function migrationsStartForOrg(string $org): Response {
        return $this->connector->send(new MigrationsStartForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  array  $exclude  Exclude attributes from the API response to improve performance
     */
    public function migrationsGetStatusForOrg(string $org, int $migrationId, ?array $exclude): Response {
        return $this->connector->send(new MigrationsGetStatusForOrg($org, $migrationId, $exclude));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function migrationsDownloadArchiveForOrg(string $org, int $migrationId): Response {
        return $this->connector->send(new MigrationsDownloadArchiveForOrg($org, $migrationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function migrationsDeleteArchiveForOrg(string $org, int $migrationId): Response {
        return $this->connector->send(new MigrationsDeleteArchiveForOrg($org, $migrationId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  string  $repoName  repo_name parameter
     */
    public function migrationsUnlockRepoForOrg(string $org, int $migrationId, string $repoName): Response {
        return $this->connector->send(new MigrationsUnlockRepoForOrg($org, $migrationId, $repoName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function migrationsListReposForOrg(string $org, int $migrationId, ?int $page): Response {
        return $this->connector->send(new MigrationsListReposForOrg($org, $migrationId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsGetImportStatus(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsGetImportStatus($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsStartImport(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsStartImport($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsCancelImport(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsCancelImport($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsUpdateImport(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsUpdateImport($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $since  A user ID. Only return users with an ID greater than this ID.
     */
    public function migrationsGetCommitAuthors(string $owner, string $repo, ?int $since): Response {
        return $this->connector->send(new MigrationsGetCommitAuthors($owner, $repo, $since));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsMapCommitAuthor(string $owner, string $repo, int $authorId): Response {
        return $this->connector->send(new MigrationsMapCommitAuthor($owner, $repo, $authorId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsGetLargeFiles(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsGetLargeFiles($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function migrationsSetLfsPreference(string $owner, string $repo): Response {
        return $this->connector->send(new MigrationsSetLfsPreference($owner, $repo));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function migrationsListForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new MigrationsListForAuthenticatedUser($page));
    }

    public function migrationsStartForAuthenticatedUser(): Response {
        return $this->connector->send(new MigrationsStartForAuthenticatedUser);
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function migrationsGetStatusForAuthenticatedUser(int $migrationId, ?array $exclude): Response {
        return $this->connector->send(new MigrationsGetStatusForAuthenticatedUser($migrationId, $exclude));
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function migrationsGetArchiveForAuthenticatedUser(int $migrationId): Response {
        return $this->connector->send(new MigrationsGetArchiveForAuthenticatedUser($migrationId));
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function migrationsDeleteArchiveForAuthenticatedUser(int $migrationId): Response {
        return $this->connector->send(new MigrationsDeleteArchiveForAuthenticatedUser($migrationId));
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  string  $repoName  repo_name parameter
     */
    public function migrationsUnlockRepoForAuthenticatedUser(int $migrationId, string $repoName): Response {
        return $this->connector->send(new MigrationsUnlockRepoForAuthenticatedUser($migrationId, $repoName));
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function migrationsListReposForAuthenticatedUser(int $migrationId, ?int $page): Response {
        return $this->connector->send(new MigrationsListReposForAuthenticatedUser($migrationId, $page));
    }
}
