<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/get-status-for-authenticated-user
 *
 * Fetches a single user migration. The response includes the `state` of the migration, which can be
 * one of the following values:
 *
 * *   `pending` - the migration hasn't started yet.
 * *   `exporting` -
 * the migration is in progress.
 * *   `exported` - the migration finished successfully.
 * *   `failed` -
 * the migration failed.
 *
 * Once the migration has been `exported` you can [download the migration
 * archive](https://docs.github.com/rest/migrations/users#download-a-user-migration-archive).
 */
class MigrationsGetStatusForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/migrations/{$this->migrationId}";
    }

    /**
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function __construct(
        protected int $migrationId,
        protected ?array $exclude = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['exclude' => $this->exclude]);
    }
}
