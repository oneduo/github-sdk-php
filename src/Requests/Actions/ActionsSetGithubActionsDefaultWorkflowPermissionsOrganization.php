<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-github-actions-default-workflow-permissions-organization
 *
 * Sets the default workflow permissions granted to the `GITHUB_TOKEN` when running workflows in an
 * organization, and sets if GitHub Actions
 * can submit approving pull request reviews. For more
 * information, see
 * "[Setting the permissions of the GITHUB_TOKEN for your
 * organization](https://docs.github.com/organizations/managing-organization-settings/disabling-or-limiting-github-actions-for-your-organization#setting-the-permissions-of-the-github_token-for-your-organization)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsSetGithubActionsDefaultWorkflowPermissionsOrganization extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/permissions/workflow";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
