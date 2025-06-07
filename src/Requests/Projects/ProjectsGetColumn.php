<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get-column
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsGetColumn extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/projects/columns/{$this->columnId}";
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     */
    public function __construct(
        protected int $columnId,
    ) {}
}
