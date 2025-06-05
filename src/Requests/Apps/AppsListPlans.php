<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-plans
 *
 * Lists all plans that are part of your GitHub Marketplace listing.
 *
 * GitHub Apps must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint. OAuth apps must use [basic
 * authentication](https://docs.github.com/rest/authentication/authenticating-to-the-rest-api#using-basic-authentication)
 * with their client ID and client secret to access this endpoint.
 */
class AppsListPlans extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/marketplace_listing/plans';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
