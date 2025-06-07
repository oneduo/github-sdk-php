<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/delete-configuration-for-enterprise
 *
 * Deletes a code security configuration from an enterprise.
 * Repositories attached to the configuration
 * will retain their settings but will no longer be associated with
 * the configuration.
 *
 * The
 * authenticated user must be an administrator for the enterprise to use this endpoint.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:enterprise` scope to use this endpoint.
 */
class CodeSecurityDeleteConfigurationForEnterprise extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/code-security/configurations/{$this->configurationId}";
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  int  $configurationId  The unique identifier of the code security configuration.
     */
    public function __construct(
        protected string $enterprise,
        protected int $configurationId,
    ) {}
}
