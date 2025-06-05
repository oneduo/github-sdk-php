<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reactions/delete-for-release
 *
 * > [!NOTE]
 * > You can also specify a repository by `repository_id` using the route `DELETE delete
 * /repositories/:repository_id/releases/:release_id/reactions/:reaction_id`.
 *
 * Delete a reaction to a
 * [release](https://docs.github.com/rest/releases/releases#get-a-release).
 */
class ReactionsDeleteForRelease extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/releases/{$this->releaseId}/reactions/{$this->reactionId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $releaseId,
        protected int $reactionId,
    ) {}
}
