<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-tag-protection
 *
 * > [!WARNING]
 * > **Closing down notice:** This operation is closing down and will be removed after
 * August 30, 2024. Use the "[Repository
 * Rulesets](https://docs.github.com/rest/repos/rules#delete-a-repository-ruleset)" endpoint
 * instead.
 *
 * This deletes a tag protection state for a repository.
 * This endpoint is only available to
 * repository administrators.
 */
class ReposDeleteTagProtection extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/tags/protection/{$this->tagProtectionId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $tagProtectionId  The unique identifier of the tag protection.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $tagProtectionId,
    ) {}
}
