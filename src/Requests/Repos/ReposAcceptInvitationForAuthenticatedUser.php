<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/accept-invitation-for-authenticated-user
 */
class ReposAcceptInvitationForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
