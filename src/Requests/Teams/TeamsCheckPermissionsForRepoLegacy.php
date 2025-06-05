<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/check-permissions-for-repo-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Check team
 * permissions for a
 * repository](https://docs.github.com/rest/teams/teams#check-team-permissions-for-a-repository)
 * endpoint.
 *
 * > [!NOTE]
 * > Repositories inherited through a parent team will also be checked.
 *
 * You can
 * also get information about the specified repository, including what permissions the team grants on
 * it, by passing the following custom [media
 * type](https://docs.github.com/rest/using-the-rest-api/getting-started-with-the-rest-api#media-types/)
 * via the `Accept` header:
 */
class TeamsCheckPermissionsForRepoLegacy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
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
