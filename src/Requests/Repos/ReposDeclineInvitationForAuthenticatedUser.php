<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/decline-invitation-for-authenticated-user
 */
class ReposDeclineInvitationForAuthenticatedUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/user/repository_invitations/{$this->invitationId}";
    }

    /**
     * @param  int  $invitationId  The unique identifier of the invitation.
     */
    public function __construct(
        protected int $invitationId,
    ) {}
}
