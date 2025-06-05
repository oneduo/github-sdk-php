<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-security-manager-teams
 *
 * > [!WARNING]
 * > **Closing down notice:** This operation is closing down and will be removed starting
 * January 1, 2026. Please use the "[Organization
 * Roles](https://docs.github.com/rest/orgs/organization-roles)" endpoints instead.
 */
class OrgsListSecurityManagerTeams extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/security-managers";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
