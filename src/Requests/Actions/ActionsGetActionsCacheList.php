<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-actions-cache-list
 *
 * Lists the GitHub Actions caches for a repository.
 *
 * OAuth tokens and personal access tokens (classic)
 * need the `repo` scope to use this endpoint.
 */
class ActionsGetActionsCacheList extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/caches";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $ref  The full Git reference for narrowing down the cache. The `ref` for a branch should be formatted as `refs/heads/<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  null|string  $key  An explicit key or prefix for identifying the cache
     * @param  null|string  $sort  The property to sort the results by. `created_at` means when the cache was created. `last_accessed_at` means when the cache was last accessed. `size_in_bytes` is the size of the cache in bytes.
     * @param  null|string  $direction  The direction to sort the results by.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $ref = null,
        protected ?string $key = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'page' => $this->page,
            'per_page' => $this->perPage,
            'ref' => $this->ref,
            'key' => $this->key,
            'sort' => $this->sort,
            'direction' => $this->direction,
        ]);
    }
}
