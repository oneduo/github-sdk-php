<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/add-or-update-repo-permissions-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new "[Add or update
 * team repository
 * permissions](https://docs.github.com/rest/teams/teams#add-or-update-team-repository-permissions)"
 * endpoint.
 *
 * To add a repository to a team or update the team's permission on a repository, the
 * authenticated user must have admin access to the repository, and must be able to see the team. The
 * repository must be owned by the organization, or a direct fork of a repository owned by the
 * organization. You will get a `422 Unprocessable Entity` status if you attempt to add a repository to
 * a team that is not owned by the organization.
 *
 * Note that, if you choose not to pass any parameters,
 * you'll need to set `Content-Length` to zero when calling out to this endpoint. For more information,
 * see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 */
class TeamsAddOrUpdateRepoPermissionsLegacy extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/repos/{$this->owner}/{$this->repo}";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected int $teamId,
        protected string $owner,
        protected string $repo,
    ) {}
}
