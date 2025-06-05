<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-selected-repositories-enabled-github-actions-organization
 *
 * Replaces the list of selected repositories that are enabled for GitHub Actions in an organization.
 * To use this endpoint, the organization permission policy for `enabled_repositories` must be
 * configured to `selected`. For more information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsSetSelectedRepositoriesEnabledGithubActionsOrganization extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/permissions/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
