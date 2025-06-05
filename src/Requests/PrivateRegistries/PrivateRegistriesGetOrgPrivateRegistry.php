<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\PrivateRegistries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * private-registries/get-org-private-registry
 *
 *
 * Get the configuration of a single private registry defined for an organization, omitting its
 * encrypted value.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org` scope
 * to use this endpoint.
 */
class PrivateRegistriesGetOrgPrivateRegistry extends Request {
    protected Method $method = Method::GET;

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
