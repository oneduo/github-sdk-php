<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/delete-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [Delete a
 * team](https://docs.github.com/rest/teams/teams#delete-a-team) endpoint.
 *
 * To delete a team, the
 * authenticated user must be an organization owner or team maintainer.
 *
 * If you are an organization
 * owner, deleting a parent team will delete all of its child teams as well.
 */
class TeamsDeleteLegacy extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function __construct(
        protected int $teamId,
    ) {}
}
