<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/remove-outside-collaborator
 *
 * Removing a user from this list will remove them from all the organization's repositories.
 */
class OrgsRemoveOutsideCollaborator extends Request
{
    protected Method $method = Method::DELETE;

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
