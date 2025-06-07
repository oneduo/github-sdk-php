<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-org-secret
 *
 * Deletes a secret in an organization using the secret name.
 *
 * Authenticated users must have
 * collaborator access to a repository to create, update, or read secrets.
 *
 * OAuth tokens and personal
 * access tokens (classic) need the`admin:org` scope to use this endpoint. If the repository is
 * private, OAuth tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint.
 */
class ActionsDeleteOrgSecret extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/{$this->secretName}";
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
