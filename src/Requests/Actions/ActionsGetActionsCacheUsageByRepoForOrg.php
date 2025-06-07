<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-usage-by-repo-for-org
 *
 * Lists repositories and their GitHub Actions cache usage for an organization.
 * The data fetched using
 * this API is refreshed approximately every 5 minutes, so values returned from this endpoint may take
 * at least 5 minutes to get updated.
 *
 * OAuth tokens and personal access tokens (classic) need the
 * `read:org` scope to use this endpoint.
 */
class ActionsGetActionsCacheUsageByRepoForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/cache/usage-by-repository";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
