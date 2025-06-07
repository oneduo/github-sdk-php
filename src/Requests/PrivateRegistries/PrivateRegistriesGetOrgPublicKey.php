<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\PrivateRegistries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * private-registries/get-org-public-key
 *
 *
 * Gets the org public key, which is needed to encrypt private registry secrets. You need to encrypt a
 * secret before you can create or update secrets.
 *
 * OAuth tokens and personal access tokens (classic)
 * need the `admin:org` scope to use this endpoint.
 */
class PrivateRegistriesGetOrgPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/private-registries/public-key";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
