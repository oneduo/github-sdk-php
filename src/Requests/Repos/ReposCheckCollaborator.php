<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/check-collaborator
 *
 * For organization-owned repositories, the list of collaborators includes outside collaborators,
 * organization members that are direct collaborators, organization members with access through team
 * memberships, organization members with access through default organization permissions, and
 * organization owners.
 *
 * Team members will include the members of child teams.
 *
 * The authenticated user
 * must have push access to the repository to use this endpoint.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:org` and `repo` scopes to use this endpoint.
 */
class ReposCheckCollaborator extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/collaborators/{$this->username}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $username,
    ) {}
}
