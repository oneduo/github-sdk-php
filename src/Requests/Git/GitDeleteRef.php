<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/delete-ref
 *
 * Deletes the provided reference.
 */
class GitDeleteRef extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/git/refs/{$this->ref}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The Git reference. For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
    ) {}
}
