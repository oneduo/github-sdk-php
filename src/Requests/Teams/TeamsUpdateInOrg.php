<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/update-in-org
 *
 * To edit a team, the authenticated user must either be an organization owner or a team maintainer.
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `PATCH
 * /organizations/{org_id}/team/{team_id}`.
 */
class TeamsUpdateInOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}";
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
