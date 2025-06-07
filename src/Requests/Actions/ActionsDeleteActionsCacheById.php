<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-actions-cache-by-id
 *
 * Deletes a GitHub Actions cache for a repository, using a cache ID.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDeleteActionsCacheById extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/caches/{$this->cacheId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $cacheId  The unique identifier of the GitHub Actions cache.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $cacheId,
    ) {}
}
