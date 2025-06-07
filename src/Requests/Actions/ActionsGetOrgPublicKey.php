<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-org-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to
 * encrypt a secret before you can
 * create or update secrets.
 *
 * The authenticated user must have collaborator access to a repository to
 * create, update, or read secrets.
 *
 * OAuth tokens and personal access tokens (classic) need
 * the`admin:org` scope to use this endpoint. If the repository is private, OAuth tokens and personal
 * access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsGetOrgPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/public-key";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
