<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/create-column
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsCreateColumn extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/projects/{$this->projectId}/columns";
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     */
    public function __construct(
        protected int $projectId,
    ) {}
}
