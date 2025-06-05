<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeSecurity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-security/create-configuration
 *
 * Creates a code security configuration in an organization.
 *
 * The authenticated user must be an
 * administrator or security manager for the organization to use this endpoint.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `write:org` scope to use this endpoint.
 */
class CodeSecurityCreateConfiguration extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/code-security/configurations";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
