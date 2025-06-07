<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/set-configuration-as-default-for-enterprise
 *
 * Sets a code security configuration as a default to be applied to new repositories in your
 * enterprise.
 *
 * This configuration will be applied by default to the matching repository type when
 * created, but only for organizations within the enterprise that do not already have a default code
 * security configuration set.
 *
 * The authenticated user must be an administrator for the enterprise to
 * use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:enterprise` scope to use this endpoint.
 */
class CodeSecuritySetConfigurationAsDefaultForEnterprise extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/code-security/configurations/{$this->configurationId}/defaults";
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
