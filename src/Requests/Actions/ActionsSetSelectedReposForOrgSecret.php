<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-selected-repos-for-org-secret
 *
 * Replaces all repositories for an organization secret when the `visibility`
 * for repository access is
 * set to `selected`. The visibility is set when you [Create
 * or update an organization
 * secret](https://docs.github.com/rest/actions/secrets#create-or-update-an-organization-secret).
 *
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read secrets.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `admin:org` scope to use this endpoint. If the
 * repository is private, the `repo` scope is also required.
 */
class ActionsSetSelectedReposForOrgSecret extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/secrets/{$this->secretName}/repositories";
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
