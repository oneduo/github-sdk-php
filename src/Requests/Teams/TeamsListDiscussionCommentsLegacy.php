<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-discussion-comments-legacy
 *
 * > [!WARNING]
 * > **Endpoint closing down notice:** This endpoint route is closing down and will be
 * removed from the Teams API. We recommend migrating your existing code to use the new [List
 * discussion
 * comments](https://docs.github.com/rest/teams/discussion-comments#list-discussion-comments)
 * endpoint.
 *
 * List all comments on a team discussion.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `read:discussion` scope to use this endpoint.
 */
class TeamsListDiscussionCommentsLegacy extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/teams/{$this->teamId}/discussions/{$this->discussionNumber}/comments";
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $teamId,
        protected int $discussionNumber,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['direction' => $this->direction, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
