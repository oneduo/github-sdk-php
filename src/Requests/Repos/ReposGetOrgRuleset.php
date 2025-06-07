<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-org-ruleset
 *
 * Get a repository ruleset for an organization.
 *
 * **Note:** To prevent leaking sensitive information,
 * the `bypass_actors` property is only returned if the user
 * making the API request has write access to
 * the ruleset.
 */
class ReposGetOrgRuleset extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/rulesets/{$this->rulesetId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     */
    public function __construct(
        protected string $org,
        protected int $rulesetId,
    ) {}
}
