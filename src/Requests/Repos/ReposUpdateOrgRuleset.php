<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/update-org-ruleset
 *
 * Update a ruleset for an organization.
 */
class ReposUpdateOrgRuleset extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
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
