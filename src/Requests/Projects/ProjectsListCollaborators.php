<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-collaborators
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsListCollaborators extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/projects/{$this->projectId}/collaborators";
    }

    /**
     * @param  int  $projectId  The unique identifier of the project.
     * @param  null|string  $affiliation  Filters the collaborators by their affiliation. `outside` means outside collaborators of a project that are not a member of the project's organization. `direct` means collaborators with permissions to a project, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $projectId,
        protected ?string $affiliation = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['affiliation' => $this->affiliation, 'page' => $this->page]);
    }
}
