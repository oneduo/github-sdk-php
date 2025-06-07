<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-github-actions-permissions-organization
 *
 * Gets the GitHub Actions permissions policy for repositories and allowed actions and reusable
 * workflows in an organization.
 *
 * OAuth tokens and personal access tokens (classic) need the
 * `admin:org` scope to use this endpoint.
 */
class ActionsGetGithubActionsPermissionsOrganization extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/permissions";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
