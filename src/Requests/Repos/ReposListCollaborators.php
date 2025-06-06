<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-collaborators
 *
 * For organization-owned repositories, the list of collaborators includes outside collaborators,
 * organization members that are direct collaborators, organization members with access through team
 * memberships, organization members with access through default organization permissions, and
 * organization owners.
 * The `permissions` hash returned in the response contains the base role
 * permissions of the collaborator. The `role_name` is the highest role assigned to the collaborator
 * after considering all sources of grants, including: repo, teams, organization, and enterprise.
 * There
 * is presently not a way to differentiate between an organization level grant and a repository level
 * grant from this endpoint response.
 *
 * Team members will include the members of child teams.
 *
 * The
 * authenticated user must have write, maintain, or admin privileges on the repository to use this
 * endpoint. For organization-owned repositories, the authenticated user needs to be a member of the
 * organization.
 * OAuth app tokens and personal access tokens (classic) need the `read:org` and `repo`
 * scopes to use this endpoint.
 */
class ReposListCollaborators extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/collaborators";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $affiliation  Filter collaborators returned by their affiliation. `outside` means all outside collaborators of an organization-owned repository. `direct` means all collaborators with permissions to an organization-owned repository, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  null|string  $permission  Filter collaborators by the permissions they have on the repository. If not specified, all collaborators will be returned.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $affiliation = null,
        protected ?string $permission = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['affiliation' => $this->affiliation, 'permission' => $this->permission, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
