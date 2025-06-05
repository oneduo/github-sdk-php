<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/codespace-machines-for-authenticated-user
 *
 * List the machine types a codespace can transition to use.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesCodespaceMachinesForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/codespaces/{$this->codespaceName}/machines";
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function __construct(
        protected string $codespaceName,
    ) {}
}
