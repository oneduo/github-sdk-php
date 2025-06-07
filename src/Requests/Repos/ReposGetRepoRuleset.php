<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-ruleset
 *
 * Get a ruleset for a repository.
 *
 * **Note:** To prevent leaking sensitive information, the
 * `bypass_actors` property is only returned if the user
 * making the API request has write access to the
 * ruleset.
 */
class ReposGetRepoRuleset extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rulesets/{$this->rulesetId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  null|bool  $includesParents  Include rulesets configured at higher levels that apply to this repository
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $rulesetId,
        protected ?bool $includesParents = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['includes_parents' => $this->includesParents]);
    }
}
