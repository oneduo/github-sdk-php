<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-app-installations
 *
 * Lists all GitHub Apps in an organization. The installation count includes
 * all GitHub Apps installed
 * on repositories in the organization.
 *
 * The authenticated user must be an organization owner to use
 * this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:read` scope to
 * use this endpoint.
 */
class OrgsListAppInstallations extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/installations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
