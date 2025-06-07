<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/check-blocked-user
 *
 * Returns a 204 if the given user is blocked by the given organization. Returns a 404 if the
 * organization is not blocking the user, or if the user account has been identified as spam by GitHub.
 */
class OrgsCheckBlockedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/blocks/{$this->username}";
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
