<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Teams;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/update-discussion-in-org
 *
 * Edits the title and body text of a discussion post. Only the parameters you provide are updated.
 *
 * >
 * [!NOTE]
 * > You can also specify a team by `org_id` and `team_id` using the route `PATCH
 * /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}`.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `write:discussion` scope to use this endpoint.
 */
class TeamsUpdateDiscussionInOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function __construct(
        protected string $org,
        protected string $teamSlug,
        protected int $discussionNumber,
    ) {}
}
