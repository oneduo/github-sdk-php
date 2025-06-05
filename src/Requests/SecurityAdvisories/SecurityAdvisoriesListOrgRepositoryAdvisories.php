<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/list-org-repository-advisories
 *
 * Lists repository security advisories for an organization.
 *
 * The authenticated user must be an owner
 * or security manager for the organization to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` or `repository_advisories:write` scope to use this endpoint.
 */
class SecurityAdvisoriesListOrgRepositoryAdvisories extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/security-advisories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $sort  The property to sort the results by.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $state  Filter by the state of the repository advisories. Only advisories of this state will be returned.
     */
    public function __construct(
        protected string $org,
        protected ?string $direction = null,
        protected ?string $sort = null,
        protected ?string $before = null,
        protected ?string $state = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['direction' => $this->direction, 'sort' => $this->sort, 'before' => $this->before, 'state' => $this->state]);
    }
}
