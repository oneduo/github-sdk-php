<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-org-ruleset-version
 *
 * Get a version of an organization ruleset.
 */
class OrgsGetOrgRulesetVersion extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/rulesets/{$this->rulesetId}/history/{$this->versionId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $rulesetId  The ID of the ruleset.
     * @param  int  $versionId  The ID of the version
     */
    public function __construct(
        protected string $org,
        protected int $rulesetId,
        protected int $versionId,
    ) {}
}
