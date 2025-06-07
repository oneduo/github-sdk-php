<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-single-configuration-for-enterprise
 *
 * Gets a code security configuration available in an enterprise.
 *
 * The authenticated user must be an
 * administrator of the enterprise in order to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:enterprise` scope to use this endpoint.
 */
class CodeSecurityGetSingleConfigurationForEnterprise extends Request
{
    protected Method $method = Method::GET;

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
