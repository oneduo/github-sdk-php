<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-org-secret
 *
 * Deletes an organization development environment secret using the secret name.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class CodespacesDeleteOrgSecret extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/codespaces/secrets/{$this->secretName}";
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
