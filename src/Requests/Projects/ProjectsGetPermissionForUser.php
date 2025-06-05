<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get-permission-for-user
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsGetPermissionForUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/projects/{$this->projectId}/collaborators/{$this->username}/permission";
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected int $projectId,
        protected string $username,
    ) {}
}
