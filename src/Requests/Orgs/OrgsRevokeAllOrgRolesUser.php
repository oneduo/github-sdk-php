<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/revoke-all-org-roles-user
 *
 * Revokes all assigned organization roles from a user. For more information on organization roles, see
 * "[Using organization
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/using-organization-roles)."
 *
 * The
 * authenticated user must be an administrator for the organization to use this endpoint.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsRevokeAllOrgRolesUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/organization-roles/users/{$this->username}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $org,
        protected string $username,
    ) {}
}
