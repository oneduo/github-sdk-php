<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-docker-migration-conflicting-packages-for-user
 *
 * Lists all packages that are in a specific user's namespace, that the requesting user has access to,
 * and that encountered a conflict during Docker migration.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:packages` scope to use this endpoint.
 */
class PackagesListDockerMigrationConflictingPackagesForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/docker/conflicts";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
