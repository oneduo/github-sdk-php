<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/unlock-repo-for-authenticated-user
 *
 * Unlocks a repository. You can lock repositories when you [start a user
 * migration](https://docs.github.com/rest/migrations/users#start-a-user-migration). Once the migration
 * is complete you can unlock each repository to begin using it again or [delete the
 * repository](https://docs.github.com/rest/repos/repos#delete-a-repository) if you no longer need the
 * source data. Returns a status of `404 Not Found` if the repository is not locked.
 */
class MigrationsUnlockRepoForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/migrations/{$this->migrationId}/repos/{$this->repoName}/lock";
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  string  $repoName  repo_name parameter
     */
    public function __construct(
        protected int $migrationId,
        protected string $repoName,
    ) {}
}
