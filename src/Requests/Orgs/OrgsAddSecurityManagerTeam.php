<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/add-security-manager-team
 *
 * > [!WARNING]
 * > **Closing down notice:** This operation is closing down and will be removed starting
 * January 1, 2026. Please use the "[Organization
 * Roles](https://docs.github.com/rest/orgs/organization-roles)" endpoints instead.
 */
class OrgsAddSecurityManagerTeam extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/security-managers/teams/{$this->teamSlug}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
    ) {}
}
