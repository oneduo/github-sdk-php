<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/convert-member-to-outside-collaborator
 *
 * When an organization member is converted to an outside collaborator, they'll only have access to the
 * repositories that their current team membership allows. The user will no longer be a member of the
 * organization. For more information, see "[Converting an organization member to an outside
 * collaborator](https://docs.github.com/articles/converting-an-organization-member-to-an-outside-collaborator/)".
 * Converting an organization member to an outside collaborator may be restricted by enterprise
 * administrators. For more information, see "[Enforcing repository management policies in your
 * enterprise](https://docs.github.com/admin/policies/enforcing-policies-for-your-enterprise/enforcing-repository-management-policies-in-your-enterprise#enforcing-a-policy-for-inviting-outside-collaborators-to-repositories)."
 */
class OrgsConvertMemberToOutsideCollaborator extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/outside_collaborators/{$this->username}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $org,
        protected string $username,
    ) {}
}
