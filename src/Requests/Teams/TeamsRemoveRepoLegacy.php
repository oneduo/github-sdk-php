<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/remove-repo-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Remove a
 * repository from a team](https://docs.github.com/rest/teams/teams#remove-a-repository-from-a-team)
 * endpoint.
 *
 * If the authenticated user is an organization owner or a team maintainer, they can remove
 * any repositories from the team. To remove a repository from a team as an organization member, the
 * authenticated user must have admin access to the repository and must be able to see the team. NOTE:
 * This does not delete the repository, it just removes it from the team.
 */
class TeamsRemoveRepoLegacy extends Request
{
    protected Method $method = Method::DELETE;

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
