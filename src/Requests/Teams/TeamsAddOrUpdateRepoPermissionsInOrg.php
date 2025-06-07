<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-repo-permissions-in-org
 *
 * To add a repository to a team or update the team's permission on a repository, the authenticated
 * user must have admin access to the repository, and must be able to see the team. The repository must
 * be owned by the organization, or a direct fork of a repository owned by the organization. You will
 * get a `422 Unprocessable Entity` status if you attempt to add a repository to a team that is not
 * owned by the organization. Note that, if you choose not to pass any parameters, you'll need to set
 * `Content-Length` to zero when calling out to this endpoint. For more information, see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `PUT
 * /organizations/{org_id}/team/{team_id}/repos/{owner}/{repo}`.
 *
 * For more information about the
 * permission levels, see "[Repository permission levels for an
 * organization](https://docs.github.com/github/setting-up-and-managing-organizations-and-teams/repository-permission-levels-for-an-organization#permission-levels-for-repositories-owned-by-an-organization)".
 */
class TeamsAddOrUpdateRepoPermissionsInOrg extends Request
{
    protected Method $method = Method::PUT;

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
