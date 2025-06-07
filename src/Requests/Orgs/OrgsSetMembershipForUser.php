<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/set-membership-for-user
 *
 * Only authenticated organization owners can add a member to the organization or update the member's
 * role.
 *
 * *   If the authenticated user is _adding_ a member to the organization, the invited user will
 * receive an email inviting them to the organization. The user's [membership
 * status](https://docs.github.com/rest/orgs/members#get-organization-membership-for-a-user) will be
 * `pending` until they accept the invitation.
 *
 * *   Authenticated users can _update_ a user's
 * membership by passing the `role` parameter. If the authenticated user changes a member's role to
 * `admin`, the affected user will receive an email notifying them that they've been made an
 * organization owner. If the authenticated user changes an owner's role to `member`, no email will be
 * sent.
 *
 * **Rate limits**
 *
 * To prevent abuse, organization owners are limited to creating 50
 * organization invitations for an organization within a 24 hour period. If the organization is more
 * than one month old or on a paid plan, the limit is 500 invitations per 24 hour period.
 */
class OrgsSetMembershipForUser extends Request
{
    protected Method $method = Method::PUT;

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
