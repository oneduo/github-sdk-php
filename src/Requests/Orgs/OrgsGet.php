<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get
 *
 * Gets information about an organization.
 *
 * When the value of `two_factor_requirement_enabled` is
 * `true`, the organization requires all members, billing managers, outside collaborators, guest
 * collaborators, repository collaborators, or everyone with access to any repository within the
 * organization to enable [two-factor
 * authentication](https://docs.github.com/articles/securing-your-account-with-two-factor-authentication-2fa/).
 *
 * To
 * see the full details about an organization, the authenticated user must be an organization
 * owner.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org` scope to see the
 * full details about an organization.
 *
 * To see information about an organization's GitHub plan, GitHub
 * Apps need the `Organization plan` permission.
 */
class OrgsGet extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
