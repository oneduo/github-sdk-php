<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\PrivateRegistries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * private-registries/delete-org-private-registry
 *
 *
 * Delete a private registry configuration at the organization-level.
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class PrivateRegistriesDeleteOrgPrivateRegistry extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/private-registries/{$this->secretName}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function __construct(
        protected string $org,
        protected string $secretName,
    ) {}
}
