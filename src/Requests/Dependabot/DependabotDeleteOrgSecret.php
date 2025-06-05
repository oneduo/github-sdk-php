<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/delete-org-secret
 *
 * Deletes a secret in an organization using the secret name.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class DependabotDeleteOrgSecret extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/dependabot/secrets/{$this->secretName}";
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
