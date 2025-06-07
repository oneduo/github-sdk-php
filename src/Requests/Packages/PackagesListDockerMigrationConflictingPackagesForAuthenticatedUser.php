<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-docker-migration-conflicting-packages-for-authenticated-user
 *
 * Lists all packages that are owned by the authenticated user within the user's namespace, and that
 * encountered a conflict during a Docker migration.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `read:packages` scope to use this endpoint.
 */
class PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/docker/conflicts';
    }

    public function __construct() {}
}
