<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-export-details-for-authenticated-user
 *
 * Gets information about an export of a codespace.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesGetExportDetailsForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/codespaces/{$this->codespaceName}/exports/{$this->exportId}";
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     * @param  string  $exportId  The ID of the export operation, or `latest`. Currently only `latest` is currently supported.
     */
    public function __construct(
        protected string $codespaceName,
        protected string $exportId,
    ) {}
}
