<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/codeowners-errors
 *
 * List any syntax errors that are detected in the CODEOWNERS
 * file.
 *
 * For more information about the
 * correct CODEOWNERS syntax,
 * see "[About code
 * owners](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/about-code-owners)."
 */
class ReposCodeownersErrors extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/codeowners/errors";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $ref  A branch, tag or commit name used to determine which version of the CODEOWNERS file to use. Default: the repository's default branch (e.g. `main`)
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $ref = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['ref' => $this->ref]);
    }
}
