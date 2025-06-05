<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * campaigns/list-org-campaigns
 *
 * Lists campaigns in an organization.
 *
 * The authenticated user must be an owner or security manager for
 * the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * the `security_events` scope to use this endpoint.
 */
class CampaignsListOrgCampaigns extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/campaigns";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $state  If specified, only campaigns with this state will be returned.
     * @param  null|string  $sort  The property by which to sort the results.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?string $direction = null,
        protected ?string $state = null,
        protected ?string $sort = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'direction' => $this->direction, 'state' => $this->state, 'sort' => $this->sort]);
    }
}
