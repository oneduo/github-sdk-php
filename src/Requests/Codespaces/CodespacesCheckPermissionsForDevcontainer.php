<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/check-permissions-for-devcontainer
 *
 * Checks whether the permissions defined by a given devcontainer configuration have been accepted by
 * the authenticated user.
 *
 * OAuth app tokens and personal access tokens (classic) need the `codespace`
 * scope to use this endpoint.
 */
class CodespacesCheckPermissionsForDevcontainer extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codespaces/permissions_check";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The git reference that points to the location of the devcontainer configuration to use for the permission check. The value of `ref` will typically be a branch name (`heads/BRANCH_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  string  $devcontainerPath  Path to the devcontainer.json configuration to use for the permission check.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
        protected string $devcontainerPath,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['ref' => $this->ref, 'devcontainer_path' => $this->devcontainerPath]);
    }
}
