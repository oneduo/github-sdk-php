<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-github-actions-default-workflow-permissions-repository
 *
 * Gets the default workflow permissions granted to the `GITHUB_TOKEN` when running workflows in a
 * repository,
 * as well as if GitHub Actions can submit approving pull request reviews.
 * For more
 * information, see "[Setting the permissions of the GITHUB_TOKEN for your
 * repository](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/enabling-features-for-your-repository/managing-github-actions-settings-for-a-repository#setting-the-permissions-of-the-github_token-for-your-repository)."
 *
 * OAuth
 * tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetGithubActionsDefaultWorkflowPermissionsRepository extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/permissions/workflow";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
