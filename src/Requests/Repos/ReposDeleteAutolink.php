<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/delete-autolink
 *
 * This deletes a single autolink reference by ID that was configured for the given
 * repository.
 *
 * Information about autolinks are only available to repository administrators.
 */
class ReposDeleteAutolink extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/autolinks/{$this->autolinkId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $autolinkId  The unique identifier of the autolink.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $autolinkId,
    ) {}
}
