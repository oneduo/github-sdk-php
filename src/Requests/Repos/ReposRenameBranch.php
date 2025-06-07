<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/rename-branch
 *
 * Renames a branch in a repository.
 *
 * > [!NOTE]
 * > Although the API responds immediately, the branch
 * rename process might take some extra time to complete in the background. You won't be able to push
 * to the old branch name while the rename process is in progress. For more information, see "[Renaming
 * a branch](https://docs.github.com/github/administering-a-repository/renaming-a-branch)".
 *
 * The
 * authenticated user must have push access to the branch. If the branch is the default branch, the
 * authenticated user must also have admin or owner permissions.
 *
 * In order to rename the default
 * branch, fine-grained access tokens also need the `administration:write` repository permission.
 */
class ReposRenameBranch extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/branches/{$this->branch}/rename";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $branch  The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $branch,
    ) {}
}
