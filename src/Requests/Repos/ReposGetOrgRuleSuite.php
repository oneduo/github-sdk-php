<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-org-rule-suite
 *
 * Gets information about a suite of rule evaluations from within an organization.
 * For more
 * information, see "[Managing rulesets for repositories in your
 * organization](https://docs.github.com/organizations/managing-organization-settings/managing-rulesets-for-repositories-in-your-organization#viewing-insights-for-rulesets)."
 */
class ReposGetOrgRuleSuite extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/rulesets/rule-suites/{$this->ruleSuiteId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $ruleSuiteId  The unique identifier of the rule suite result.
     *                            To get this ID, you can use [GET /repos/{owner}/{repo}/rulesets/rule-suites](https://docs.github.com/rest/repos/rule-suites#list-repository-rule-suites)
     *                            for repositories and [GET /orgs/{org}/rulesets/rule-suites](https://docs.github.com/rest/orgs/rule-suites#list-organization-rule-suites)
     *                            for organizations.
     */
    public function __construct(
        protected string $org,
        protected int $ruleSuiteId,
    ) {}
}
