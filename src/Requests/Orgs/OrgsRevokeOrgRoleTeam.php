<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/revoke-org-role-team
 *
 * Removes an organization role from a team. For more information on organization roles, see "[Using
 * organization
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/using-organization-roles)."
 *
 * The
 * authenticated user must be an administrator for the organization to use this endpoint.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsRevokeOrgRoleTeam extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/organization-roles/teams/{$this->teamSlug}/{$this->roleId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $roleId  The unique identifier of the role.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $roleId,
    ) {}
}
