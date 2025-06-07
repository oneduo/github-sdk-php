<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/get-tree
 *
 * Returns a single tree using the SHA1 value or ref name for that tree.
 *
 * If `truncated` is `true` in
 * the response then the number of items in the `tree` array exceeded our maximum limit. If you need to
 * fetch more items, use the non-recursive method of fetching trees, and fetch one sub-tree at a
 * time.
 *
 * > [!NOTE]
 * > The limit for the `tree` array is 100,000 entries with a maximum size of 7 MB
 * when using the `recursive` parameter.
 */
class GitGetTree extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/git/trees/{$this->treeSha}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $treeSha  The SHA1 value or ref (branch or tag) name of the tree.
     * @param  null|string  $recursive  Setting this parameter to any value returns the objects or subtrees referenced by the tree specified in `:tree_sha`. For example, setting `recursive` to any of the following will enable returning objects or subtrees: `0`, `1`, `"true"`, and `"false"`. Omit this parameter to prevent recursively returning objects or subtrees.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $treeSha,
        protected ?string $recursive = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['recursive' => $this->recursive]);
    }
}
