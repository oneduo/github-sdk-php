<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/set-configuration-as-default
 *
 * Sets a code security configuration as a default to be applied to new repositories in your
 * organization.
 *
 * This configuration will be applied to the matching repository type (all, none,
 * public, private and internal) by default when they are created.
 *
 * The authenticated user must be an
 * administrator or security manager for the organization to use this endpoint.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `write:org` scope to use this endpoint.
 */
class CodeSecuritySetConfigurationAsDefault extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/code-security/configurations/{$this->configurationId}/defaults";
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
