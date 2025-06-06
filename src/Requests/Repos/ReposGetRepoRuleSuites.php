<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-repo-rule-suites
 *
 * Lists suites of rule evaluations at the repository level.
 * For more information, see "[Managing
 * rulesets for a
 * repository](https://docs.github.com/repositories/configuring-branches-and-merges-in-your-repository/managing-rulesets/managing-rulesets-for-a-repository#viewing-insights-for-rulesets)."
 */
class ReposGetRepoRuleSuites extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rulesets/rule-suites";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $ref  The name of the ref. Cannot contain wildcard characters. Optionally prefix with `refs/heads/` to limit to branches or `refs/tags/` to limit to tags. Omit the prefix to search across all refs. When specified, only rule evaluations triggered for this ref will be returned.
     * @param  null|string  $timePeriod  The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  null|string  $actorName  The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  null|string  $ruleSuiteResult  The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $ref = null,
        protected ?string $timePeriod = null,
        protected ?string $actorName = null,
        protected ?string $ruleSuiteResult = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'ref' => $this->ref,
            'time_period' => $this->timePeriod,
            'actor_name' => $this->actorName,
            'rule_suite_result' => $this->ruleSuiteResult,
            'page' => $this->page,
            'per_page' => $this->perPage,
        ]);
    }
}
