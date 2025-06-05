<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-for-authenticated-user
 *
 * Deletes a user's codespace.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `codespace` scope to use this endpoint.
 */
class CodespacesDeleteForAuthenticatedUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/user/codespaces/{$this->codespaceName}";
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function __construct(
        protected string $codespaceName,
    ) {}
}
