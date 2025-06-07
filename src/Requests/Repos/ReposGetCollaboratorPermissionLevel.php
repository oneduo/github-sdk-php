<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-collaborator-permission-level
 *
 * Checks the repository permission and role of a collaborator.
 *
 * The `permission` attribute provides
 * the legacy base roles of `admin`, `write`, `read`, and `none`, where the
 * `maintain` role is mapped
 * to `write` and the `triage` role is mapped to `read`.
 * The `role_name` attribute provides the name of
 * the assigned role, including custom roles. The
 * `permission` can also be used to determine which base
 * level of access the collaborator has to the repository.
 *
 * The calculated permissions are the highest
 * role assigned to the collaborator after considering all sources of grants, including: repo, teams,
 * organization, and enterprise.
 * There is presently not a way to differentiate between an organization
 * level grant and a repository level grant from this endpoint response.
 */
class ReposGetCollaboratorPermissionLevel extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/collaborators/{$this->username}/permission";
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
