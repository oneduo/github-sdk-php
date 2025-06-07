<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-workflow-access-to-repository
 *
 * Sets the level of access that workflows outside of the repository have to actions and reusable
 * workflows in the repository.
 * This endpoint only applies to private repositories.
 * For more
 * information, see "[Allowing access to components in a private
 * repository](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/enabling-features-for-your-repository/managing-github-actions-settings-for-a-repository#allowing-access-to-components-in-a-private-repository)".
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsSetWorkflowAccessToRepository extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/permissions/access";
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
