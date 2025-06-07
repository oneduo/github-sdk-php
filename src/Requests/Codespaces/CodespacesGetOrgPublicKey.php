<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-org-public-key
 *
 * Gets a public key for an organization, which is required in order to encrypt secrets. You need to
 * encrypt the value of a secret before you can create or update secrets.
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class CodespacesGetOrgPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/codespaces/secrets/public-key";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
