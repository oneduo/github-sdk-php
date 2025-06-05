<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-org-role-users
 *
 * Lists organization members that are assigned to an organization role. For more information on
 * organization roles, see "[Using organization
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/using-organization-roles)."
 *
 * To
 * use this endpoint, you must be an administrator for the organization.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsListOrgRoleUsers extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/organization-roles/{$this->roleId}/users";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $roleId  The unique identifier of the role.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected int $roleId,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
