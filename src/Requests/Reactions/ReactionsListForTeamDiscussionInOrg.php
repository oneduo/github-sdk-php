<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/list-for-team-discussion-in-org
 *
 * List the reactions to a [team
 * discussion](https://docs.github.com/rest/teams/discussions#get-a-discussion).
 *
 * > [!NOTE]
 * > You can
 * also specify a team by `org_id` and `team_id` using the route `GET
 * /organizations/:org_id/team/:team_id/discussions/:discussion_number/reactions`.
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `read:discussion` scope to use this endpoint.
 */
class ReactionsListForTeamDiscussionInOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/reactions";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  null|string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
        protected ?string $content = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['content' => $this->content, 'page' => $this->page]);
    }
}
