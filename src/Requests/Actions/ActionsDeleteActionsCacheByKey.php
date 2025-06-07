<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-actions-cache-by-key
 *
 * Deletes one or more GitHub Actions caches for a repository, using a complete cache key. By default,
 * all caches that match the provided key are deleted, but you can optionally provide a Git ref to
 * restrict deletions to caches that match both the provided key and the Git ref.
 *
 * OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsDeleteActionsCacheByKey extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/caches";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $key  A key for identifying the cache.
     * @param  null|string  $ref  The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $key,
        protected ?string $ref = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['key' => $this->key, 'ref' => $this->ref]);
    }
}
