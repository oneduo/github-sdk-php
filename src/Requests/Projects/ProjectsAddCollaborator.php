<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/add-collaborator
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsAddCollaborator extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/projects/{$this->projectId}/collaborators/{$this->username}";
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
