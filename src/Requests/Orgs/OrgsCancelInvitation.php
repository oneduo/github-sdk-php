<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/cancel-invitation
 *
 * Cancel an organization invitation. In order to cancel an organization invitation, the authenticated
 * user must be an organization owner.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 */
class OrgsCancelInvitation extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/invitations/{$this->invitationId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function __construct(
        protected string $org,
        protected int $invitationId,
    ) {}
}
