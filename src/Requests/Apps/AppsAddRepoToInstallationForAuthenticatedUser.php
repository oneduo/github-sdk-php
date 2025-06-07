<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/add-repo-to-installation-for-authenticated-user
 *
 * Add a single repository to an installation. The authenticated user must have admin access to the
 * repository.
 *
 * This endpoint only works for PATs (classic) with the `repo` scope.
 */
class AppsAddRepoToInstallationForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/user/installations/{$this->installationId}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function __construct(
        protected int $installationId,
        protected int $repositoryId,
    ) {}
}
