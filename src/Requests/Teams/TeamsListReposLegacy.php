<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-repos-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [List team
 * repositories](https://docs.github.com/rest/teams/teams#list-team-repositories) endpoint.
 */
class TeamsListReposLegacy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/repos";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $teamId,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
