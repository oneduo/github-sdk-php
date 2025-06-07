<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-tag-protection
 *
 * > [!WARNING]
 * > **Closing down notice:** This operation is closing down and will be removed after
 * August 30, 2024. Use the "[Repository
 * Rulesets](https://docs.github.com/rest/repos/rules#get-all-repository-rulesets)" endpoint
 * instead.
 *
 * This returns the tag protection states of a repository.
 *
 * This information is only
 * available to repository administrators.
 */
class ReposListTagProtection extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/tags/protection";
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
