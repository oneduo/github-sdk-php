<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-security/update-enterprise-configuration
 *
 * Updates a code security configuration in an enterprise.
 *
 * The authenticated user must be an
 * administrator of the enterprise in order to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `admin:enterprise` scope to use this endpoint.
 */
class CodeSecurityUpdateEnterpriseConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
