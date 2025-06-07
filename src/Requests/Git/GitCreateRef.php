<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * git/create-ref
 *
 * Creates a reference for your repository. You are unable to create new references for empty
 * repositories, even if the commit SHA-1 hash used exists. Empty repositories are repositories without
 * branches.
 */
class GitCreateRef extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/git/refs";
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
