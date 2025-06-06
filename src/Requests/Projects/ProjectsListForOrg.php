<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-for-org
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsListForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/projects";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $state  Indicates the state of the projects to return.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $state = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['state' => $this->state, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
