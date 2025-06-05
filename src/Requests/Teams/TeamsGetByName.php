<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/get-by-name
 *
 * Gets a team using the team's `slug`. To create the `slug`, GitHub replaces special characters in the
 * `name` string, changes all words to lowercase, and replaces spaces with a `-` separator. For
 * example, `"My TEam Näme"` would become `my-team-name`.
 *
 * > [!NOTE]
 * > You can also specify a team by
 * `org_id` and `team_id` using the route `GET /organizations/{org_id}/team/{team_id}`.
 */
class TeamsGetByName extends Request {
    protected Method $method = Method::GET;

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
