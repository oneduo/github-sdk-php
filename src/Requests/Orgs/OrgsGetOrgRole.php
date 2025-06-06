<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-org-role
 *
 * Gets an organization role that is available to this organization. For more information on
 * organization roles, see "[Using organization
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/using-organization-roles)."
 *
 * To
 * use this endpoint, the authenticated user must be one of:
 *
 * - An administrator for the
 * organization.
 * - A user, or a user on a team, with the fine-grained permissions of
 * `read_organization_custom_org_role` in the organization.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsGetOrgRole extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/organization-roles/{$this->roleId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function __construct(
        protected string $org,
        protected int $roleId,
    ) {}
}
