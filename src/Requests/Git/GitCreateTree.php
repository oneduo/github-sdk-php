<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Git;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * git/create-tree
 *
 * The tree creation API accepts nested entries. If you specify both a tree and a nested path modifying
 * that tree, this endpoint will overwrite the contents of the tree with the new path contents, and
 * create a new tree structure.
 *
 * If you use this endpoint to add, delete, or modify the file contents
 * in a tree, you will need to commit the tree and then update a branch to point to the commit. For
 * more information see "[Create a commit](https://docs.github.com/rest/git/commits#create-a-commit)"
 * and "[Update a reference](https://docs.github.com/rest/git/refs#update-a-reference)."
 *
 * Returns an
 * error if you try to delete a file that does not exist.
 */
class GitCreateTree extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/git/trees";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
