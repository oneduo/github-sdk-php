<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/assign-team-to-org-role
 *
 * Assigns an organization role to a team in an organization. For more information on organization
 * roles, see "[Using organization
 * roles](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/using-organization-roles)."
 *
 * The
 * authenticated user must be an administrator for the organization to use this endpoint.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class OrgsAssignTeamToOrgRole extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
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
