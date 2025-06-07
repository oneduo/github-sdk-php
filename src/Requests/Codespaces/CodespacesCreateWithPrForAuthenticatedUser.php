<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/create-with-pr-for-authenticated-user
 *
 * Creates a codespace owned by the authenticated user for the specified pull request.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesCreateWithPrForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/codespaces";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
    ) {}
}
