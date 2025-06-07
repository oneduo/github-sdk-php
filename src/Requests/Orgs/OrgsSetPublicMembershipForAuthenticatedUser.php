<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/set-public-membership-for-authenticated-user
 *
 * The user can publicize their own membership. (A user cannot publicize the membership for another
 * user.)
 *
 * Note that you'll need to set `Content-Length` to zero when calling out to this endpoint. For
 * more information, see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 */
class OrgsSetPublicMembershipForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/public_members/{$this->username}";
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
