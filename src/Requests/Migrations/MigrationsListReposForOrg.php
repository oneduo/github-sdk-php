<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/list-repos-for-org
 *
 * List all the repositories for this organization migration.
 */
class MigrationsListReposForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/migrations/{$this->migrationId}/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $migrationId  The unique identifier of the migration.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected int $migrationId,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
