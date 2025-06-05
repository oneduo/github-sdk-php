<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/delete-in-org
 *
 * To delete a team, the authenticated user must be an organization owner or team maintainer.
 *
 * If you
 * are an organization owner, deleting a parent team will delete all of its child teams as well.
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `DELETE
 * /organizations/{org_id}/team/{team_id}`.
 */
class TeamsDeleteInOrg extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
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
