<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/unlock-repo-for-org
 *
 * Unlocks a repository that was locked for migration. You should unlock each migrated repository and
 * [delete them](https://docs.github.com/rest/repos/repos#delete-a-repository) when the migration is
 * complete and you no longer need the source data.
 */
class MigrationsUnlockRepoForOrg extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/migrations/{$this->migrationId}/repos/{$this->repoName}/lock";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  string  $repoName  repo_name parameter
     */
    public function __construct(
        protected string $org,
        protected int $migrationId,
        protected string $repoName,
    ) {}
}
