<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-org-secret
 *
 * Gets an organization development environment secret without revealing its encrypted value.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class CodespacesGetOrgSecret extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/secrets/{$this->secretName}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $org,
        protected string $secretName,
    ) {}
}
