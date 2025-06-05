<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-membership-for-authenticated-user
 *
 * If the authenticated user is an active or pending member of the organization, this endpoint will
 * return the user's membership. If the authenticated user is not affiliated with the organization, a
 * `404` is returned. This endpoint will return a `403` if the request is made by a GitHub App that is
 * blocked by the organization.
 */
class OrgsGetMembershipForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/user/memberships/orgs/{$this->org}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
