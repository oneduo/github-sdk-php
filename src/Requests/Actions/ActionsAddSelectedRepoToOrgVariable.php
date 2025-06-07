<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/add-selected-repo-to-org-variable
 *
 * Adds a repository to an organization variable that is available to selected
 * repositories.
 * Organization variables that are available to selected repositories have their
 * `visibility` field set to `selected`.
 *
 * Authenticated users must have collaborator access to a
 * repository to create, update, or read secrets.
 *
 * OAuth tokens and personal access tokens (classic)
 * need the `admin:org` scope to use this endpoint. If the repository is private, OAuth tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ActionsAddSelectedRepoToOrgVariable extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/variables/{$this->name}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     */
    public function __construct(
        protected string $org,
        protected string $name,
        protected int $repositoryId,
    ) {}
}
