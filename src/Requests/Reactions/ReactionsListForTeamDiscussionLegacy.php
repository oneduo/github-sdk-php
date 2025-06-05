<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/list-for-team-discussion-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [`List
 * reactions for a team
 * discussion`](https://docs.github.com/rest/reactions/reactions#list-reactions-for-a-team-discussion)
 * endpoint.
 *
 * List the reactions to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion).
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `read:discussion` scope to use this endpoint.
 */
class ReactionsListForTeamDiscussionLegacy extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/reactions";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  null|string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
        protected ?string $content = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['content' => $this->content, 'page' => $this->page]);
    }
}
