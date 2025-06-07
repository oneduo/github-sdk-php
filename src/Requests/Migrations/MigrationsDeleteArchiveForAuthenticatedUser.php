<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/delete-archive-for-authenticated-user
 *
 * Deletes a previous migration archive. Downloadable migration archives are automatically deleted
 * after seven days. Migration metadata, which is returned in the [List user
 * migrations](https://docs.github.com/rest/migrations/users#list-user-migrations) and [Get a user
 * migration status](https://docs.github.com/rest/migrations/users#get-a-user-migration-status)
 * endpoints, will continue to be available even after an archive is deleted.
 */
class MigrationsDeleteArchiveForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/migrations/{$this->migrationId}/archive";
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function __construct(
        protected int $migrationId,
    ) {}
}
