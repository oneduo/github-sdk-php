<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-codespaces-access-users
 *
 * Codespaces for the specified users will no longer be billed to the organization.
 *
 * To use this
 * endpoint, the access settings for the organization must be set to `selected_members`.
 * For
 * information on how to change this setting, see "[Manage access control for organization
 * codespaces](https://docs.github.com/rest/codespaces/organizations#manage-access-control-for-organization-codespaces)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class CodespacesDeleteCodespacesAccessUsers extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/access/selected_users";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
