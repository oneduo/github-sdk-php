<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-release
 *
 * Create a reaction to a [release](https://docs.github.com/rest/releases/releases#get-a-release). A
 * response with a `Status: 200 OK` means that you already added the reaction type to this release.
 */
class ReactionsCreateForRelease extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/releases/{$this->releaseId}/reactions";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $releaseId,
    ) {}
}
