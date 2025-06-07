<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/fork
 */
class GistsFork extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}/forks";
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function __construct(
        protected string $gistId,
    ) {}
}
