<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-release-by-tag
 *
 * Get a published release with the specified tag.
 */
class ReposGetReleaseByTag extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/releases/tags/{$this->tag}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $tag  tag parameter
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $tag,
    ) {}
}
