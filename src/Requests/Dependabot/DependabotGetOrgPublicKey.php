<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-org-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to
 * encrypt a secret before you can
 * create or update secrets.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:org` scope to use this endpoint.
 */
class DependabotGetOrgPublicKey extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/dependabot/secrets/public-key";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
