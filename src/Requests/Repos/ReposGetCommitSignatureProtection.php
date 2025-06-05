<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-commit-signature-protection
 *
 * Protected branches are available in public repositories with GitHub Free and GitHub Free for
 * organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub
 * Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * When authenticated with admin or owner permissions to the repository, you can
 * use this endpoint to check whether a branch requires signed commits. An enabled status of `true`
 * indicates you must sign commits on this branch. For more information, see [Signing commits with
 * GPG](https://docs.github.com/articles/signing-commits-with-gpg) in GitHub Help.
 *
 * > [!NOTE]
 * > You
 * must enable branch protection to require signed commits.
 */
class ReposGetCommitSignatureProtection extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/branches/{$this->branch}/protection/required_signatures";
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
