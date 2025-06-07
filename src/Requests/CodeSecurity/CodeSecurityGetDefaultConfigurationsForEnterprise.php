<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/get-default-configurations-for-enterprise
 *
 * Lists the default code security configurations for an enterprise.
 *
 * The authenticated user must be an
 * administrator of the enterprise in order to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:enterprise` scope to use this endpoint.
 */
class CodeSecurityGetDefaultConfigurationsForEnterprise extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/code-security/configurations/defaults";
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     */
    public function __construct(
        protected string $enterprise,
    ) {}
}
