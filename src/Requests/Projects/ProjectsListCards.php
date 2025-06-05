<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-cards
 *
 * > [!WARNING]
 * > **Closing down notice:** Projects (classic) is being deprecated in favor of the new
 * Projects experience.
 * > See the
 * [changelog](https://github.blog/changelog/2024-05-23-sunset-notice-projects-classic/) for more
 * information.
 */
class ProjectsListCards extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/projects/columns/{$this->columnId}/cards";
    }

    /**
     * @param  int  $columnId  The unique identifier of the column.
     * @param  null|string  $archivedState  Filters the project cards that are returned by the card's state.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $columnId,
        protected ?string $archivedState = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['archived_state' => $this->archivedState, 'page' => $this->page]);
    }
}
