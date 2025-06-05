<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/create-discussion-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [`Create a
 * discussion`](https://docs.github.com/rest/teams/discussions#create-a-discussion) endpoint.
 *
 * Creates
 * a new discussion post on a team's page.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/using-the-rest-api/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `write:discussion` scope to use this endpoint.
 */
class TeamsCreateDiscussionLegacy extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/discussions";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     */
    public function __construct(
        protected int $teamId,
    ) {}
}
