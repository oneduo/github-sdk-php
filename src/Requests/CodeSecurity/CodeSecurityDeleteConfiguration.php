<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-security/delete-configuration
 *
 * Deletes the desired code security configuration from an organization.
 * Repositories attached to the
 * configuration will retain their settings but will no longer be associated with
 * the
 * configuration.
 *
 * The authenticated user must be an administrator or security manager for the
 * organization to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `write:org` scope to use this endpoint.
 */
class CodeSecurityDeleteConfiguration extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
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
