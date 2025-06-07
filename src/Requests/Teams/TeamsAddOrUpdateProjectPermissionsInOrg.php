<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-project-permissions-in-org
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class TeamsAddOrUpdateProjectPermissionsInOrg extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/projects/{$this->projectId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $projectId,
    ) {}
}
