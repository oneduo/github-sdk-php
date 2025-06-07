<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/remove-membership-for-user
 *
 * In order to remove a user's membership with an organization, the authenticated user must be an
 * organization owner.
 *
 * If the specified user is an active member of the organization, this will remove
 * them from the organization. If the specified user has been invited to the organization, this will
 * cancel their invitation. The specified user will receive an email notification in both cases.
 */
class OrgsRemoveMembershipForUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/memberships/{$this->username}";
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
