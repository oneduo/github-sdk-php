<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/remove-repo-from-installation-for-authenticated-user
 *
 * Remove a single repository from an installation. The authenticated user must have admin access to
 * the repository. The installation must have the `repository_selection` of `selected`.
 *
 * This endpoint
 * only works for PATs (classic) with the `repo` scope.
 */
class AppsRemoveRepoFromInstallationForAuthenticatedUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
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
