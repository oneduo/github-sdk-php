<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-security/attach-configuration
 *
 * Attach a code security configuration to a set of repositories. If the repositories specified are
 * already attached to a configuration, they will be re-attached to the provided configuration.
 *
 * If
 * insufficient GHAS licenses are available to attach the configuration to a repository, only free
 * features will be enabled.
 *
 * The authenticated user must be an administrator or security manager for
 * the organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * the `write:org` scope to use this endpoint.
 */
class CodeSecurityAttachConfiguration extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/code-security/configurations/{$this->configurationId}/attach";
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
