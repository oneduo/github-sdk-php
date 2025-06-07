<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-ruleset-version
 *
 * Get a version of a repository ruleset.
 */
class ReposGetRepoRulesetVersion extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rulesets/{$this->rulesetId}/history/{$this->versionId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $versionId  The ID of the version
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $rulesetId,
        protected int $versionId,
    ) {}
}
