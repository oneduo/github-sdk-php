<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/delete-archive-for-org
 *
 * Deletes a previous migration archive. Migration archives are automatically deleted after seven days.
 */
class MigrationsDeleteArchiveForOrg extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/migrations/{$this->migrationId}/archive";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     */
    public function __construct(
        protected string $org,
        protected int $migrationId,
    ) {}
}
