<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/delete-for-issue
 *
 * > [!NOTE]
 * > You can also specify a repository by `repository_id` using the route `DELETE
 * /repositories/:repository_id/issues/:issue_number/reactions/:reaction_id`.
 *
 * Delete a reaction to an
 * [issue](https://docs.github.com/rest/issues/issues#get-an-issue).
 */
class ReactionsDeleteForIssue extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/reactions/{$this->reactionId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $issueNumber,
        protected int $reactionId,
    ) {}
}
