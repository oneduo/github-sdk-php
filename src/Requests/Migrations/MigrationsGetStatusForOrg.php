<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/get-status-for-org
 *
 * Fetches the status of a migration.
 *
 * The `state` of a migration can be one of the following
 * values:
 *
 * *   `pending`, which means the migration hasn't started yet.
 * *   `exporting`, which means
 * the migration is in progress.
 * *   `exported`, which means the migration finished successfully.
 * *
 * `failed`, which means the migration failed.
 */
class MigrationsGetStatusForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/migrations/{$this->migrationId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  null|array  $exclude  Exclude attributes from the API response to improve performance
     */
    public function __construct(
        protected string $org,
        protected int $migrationId,
        protected ?array $exclude = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['exclude' => $this->exclude]);
    }
}
