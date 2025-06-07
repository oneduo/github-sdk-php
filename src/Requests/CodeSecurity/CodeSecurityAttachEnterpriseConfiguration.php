<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-security/attach-enterprise-configuration
 *
 * Attaches an enterprise code security configuration to repositories. If the repositories specified
 * are already attached to a configuration, they will be re-attached to the provided configuration.
 *
 * If
 * insufficient GHAS licenses are available to attach the configuration to a repository, only free
 * features will be enabled.
 *
 * The authenticated user must be an administrator for the enterprise to use
 * this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:enterprise`
 * scope to use this endpoint.
 */
class CodeSecurityAttachEnterpriseConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/code-security/configurations/{$this->configurationId}/attach";
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
