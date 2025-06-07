<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/start-for-authenticated-user
 *
 * Starts a user's codespace.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `codespace` scope to use this endpoint.
 */
class CodespacesStartForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/{$this->codespaceName}/start";
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function __construct(
        protected string $codespaceName,
    ) {}
}
