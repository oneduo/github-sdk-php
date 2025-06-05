<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/disable-selected-repository-github-actions-organization
 *
 * Removes a repository from the list of selected repositories that are enabled for GitHub Actions in
 * an organization. To use this endpoint, the organization permission policy for `enabled_repositories`
 * must be configured to `selected`. For more information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 * OAuth tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsDisableSelectedRepositoryGithubActionsOrganization extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/permissions/repositories/{$this->repositoryId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $repositoryId  The unique identifier of the repository.
     */
    public function __construct(
        protected string $org,
        protected int $repositoryId,
    ) {}
}
