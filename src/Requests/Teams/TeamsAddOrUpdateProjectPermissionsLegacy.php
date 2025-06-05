<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-project-permissions-legacy
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class TeamsAddOrUpdateProjectPermissionsLegacy extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/projects/{$this->projectId}";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function __construct(
        protected int $teamId,
        protected int $projectId,
    ) {}
}
