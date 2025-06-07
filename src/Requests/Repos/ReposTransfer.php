<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/transfer
 *
 * A transfer request will need to be accepted by the new owner when transferring a personal repository
 * to another user. The response will contain the original `owner`, and the transfer will continue
 * asynchronously. For more details on the requirements to transfer personal and organization-owned
 * repositories, see [about repository
 * transfers](https://docs.github.com/articles/about-repository-transfers/).
 */
class ReposTransfer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/transfer";
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
