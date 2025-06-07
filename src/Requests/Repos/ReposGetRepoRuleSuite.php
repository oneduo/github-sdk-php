<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-rule-suite
 *
 * Gets information about a suite of rule evaluations from within a repository.
 * For more information,
 * see "[Managing rulesets for a
 * repository](https://docs.github.com/repositories/configuring-branches-and-merges-in-your-repository/managing-rulesets/managing-rulesets-for-a-repository#viewing-insights-for-rulesets)."
 */
class ReposGetRepoRuleSuite extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rulesets/rule-suites/{$this->ruleSuiteId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $ruleSuiteId  The unique identifier of the rule suite result.
     *                            To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     *                            for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     *                            for organizations.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $ruleSuiteId,
    ) {}
}
