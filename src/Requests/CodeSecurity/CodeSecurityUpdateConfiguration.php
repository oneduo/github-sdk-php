<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-security/update-configuration
 *
 * Updates a code security configuration in an organization.
 *
 * The authenticated user must be an
 * administrator or security manager for the organization to use this endpoint.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `write:org` scope to use this endpoint.
 */
class CodeSecurityUpdateConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/code-security/configurations/{$this->configurationId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function __construct(
        protected string $org,
        protected int $configurationId,
    ) {}
}
