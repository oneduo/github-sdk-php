<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-self-hosted-runners-for-org
 *
 * Lists all self-hosted runners configured in an organization.
 *
 * Authenticated users must have admin
 * access to the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `admin:org` scope to use this endpoint. If the repository is private, the `repo`
 * scope is also required.
 */
class ActionsListSelfHostedRunnersForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runners";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $name  The name of a self-hosted runner.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $name = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['name' => $this->name, 'page' => $this->page]);
    }
}
