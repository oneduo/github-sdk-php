<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-repo-in-org
 *
 * If the authenticated user is an organization owner or a team maintainer, they can remove any
 * repositories from the team. To remove a repository from a team as an organization member, the
 * authenticated user must have admin access to the repository and must be able to see the team. This
 * does not delete the repository, it just removes it from the team.
 *
 * > [!NOTE]
 * > You can also specify
 * a team by `org_id` and `team_id` using the route `DELETE
 * /organizations/{org_id}/team/{team_id}/repos/{owner}/{repo}`.
 */
class TeamsRemoveRepoInOrg extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/repos/{$this->owner}/{$this->repo}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected string $owner,
        protected string $repo,
    ) {}
}
