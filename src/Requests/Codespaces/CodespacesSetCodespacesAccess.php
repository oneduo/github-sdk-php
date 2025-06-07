<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/set-codespaces-access
 *
 * Sets which users can access codespaces in an organization. This is synonymous with granting or
 * revoking codespaces access permissions for users according to the visibility.
 * OAuth app tokens and
 * personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class CodespacesSetCodespacesAccess extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/access";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
