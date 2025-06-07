<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-repo-ruleset
 *
 * Delete a ruleset for a repository.
 */
class ReposDeleteRepoRuleset extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rulesets/{$this->rulesetId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $rulesetId,
    ) {}
}
