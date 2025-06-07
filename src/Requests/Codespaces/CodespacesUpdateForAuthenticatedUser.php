<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/update-for-authenticated-user
 *
 * Updates a codespace owned by the authenticated user. Currently only the codespace's machine type and
 * recent folders can be modified using this endpoint.
 *
 * If you specify a new machine type it will be
 * applied the next time your codespace is started.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesUpdateForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/user/codespaces/{$this->codespaceName}";
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function __construct(
        protected string $codespaceName,
    ) {}
}
