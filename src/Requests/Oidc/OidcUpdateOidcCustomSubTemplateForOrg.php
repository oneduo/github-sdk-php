<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Oidc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * oidc/update-oidc-custom-sub-template-for-org
 *
 * Creates or updates the customization template for an OpenID Connect (OIDC) subject claim.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `write:org` scope to use this endpoint.
 */
class OidcUpdateOidcCustomSubTemplateForOrg extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/oidc/customization/sub";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
