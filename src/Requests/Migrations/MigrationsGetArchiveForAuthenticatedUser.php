<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/get-archive-for-authenticated-user
 *
 * Fetches the URL to download the migration archive as a `tar.gz` file. Depending on the resources
 * your repository uses, the migration archive can contain JSON files with data for these objects:
 *
 * *
 * attachments
 * *   bases
 * *   commit\_comments
 * *   issue\_comments
 * *   issue\_events
 * *   issues
 * *
 * milestones
 * *   organizations
 * *   projects
 * *   protected\_branches
 * *   pull\_request\_reviews
 * *
 * pull\_requests
 * *   releases
 * *   repositories
 * *   review\_comments
 * *   schema
 * *   users
 *
 * The archive
 * will also contain an `attachments` directory that includes all attachment files uploaded to
 * GitHub.com and a `repositories` directory that contains the repository's Git data.
 */
class MigrationsGetArchiveForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

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
