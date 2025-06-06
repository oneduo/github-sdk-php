<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-self-hosted-runner-groups-for-org
 *
 * Lists all self-hosted runner groups configured in an organization and inherited from an
 * enterprise.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org` scope to use
 * this endpoint.
 */
class ActionsListSelfHostedRunnerGroupsForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/runner-groups";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $visibleToRepository  Only return runner groups that are allowed to be used by this repository.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $visibleToRepository = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'visible_to_repository' => $this->visibleToRepository]);
    }
}
