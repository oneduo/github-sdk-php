<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\PrivateRegistries;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * private-registries/update-org-private-registry
 *
 *
 * Updates a private registry configuration with an encrypted value for an organization. Encrypt your
 * secret using [LibSodium](https://libsodium.gitbook.io/doc/bindings_for_other_languages). For more
 * information, see "[Encrypting secrets for the REST
 * API](https://docs.github.com/rest/guides/encrypting-secrets-for-the-rest-api)."
 *
 * OAuth app tokens
 * and personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class PrivateRegistriesUpdateOrgPrivateRegistry extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
