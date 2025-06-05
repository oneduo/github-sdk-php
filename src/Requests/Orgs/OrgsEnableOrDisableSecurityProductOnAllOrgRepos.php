<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/enable-or-disable-security-product-on-all-org-repos
 *
 * > [!WARNING]
 * > **Closing down notice:** The ability to enable or disable a security feature for all
 * eligible repositories in an organization is closing down. Please use [code security
 * configurations](https://docs.github.com/rest/code-security/configurations) instead. For more
 * information, see the
 * [changelog](https://github.blog/changelog/2024-07-22-deprecation-of-api-endpoint-to-enable-or-disable-a-security-feature-for-an-organization/).
 *
 * Enables
 * or disables the specified security feature for all eligible repositories in an organization. For
 * more information, see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 *
 * The
 * authenticated user must be an organization owner or be member of a team with the security manager
 * role to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:org`, `write:org`, or `repo` scopes to use this endpoint.
 */
class OrgsEnableOrDisableSecurityProductOnAllOrgRepos extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/{$this->securityProduct}/{$this->enablement}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $securityProduct  The security feature to enable or disable.
     * @param  string  $enablement  The action to take.
     *
     * `enable_all` means to enable the specified security feature for all repositories in the organization.
     * `disable_all` means to disable the specified security feature for all repositories in the organization.
     */
    public function __construct(
        protected string $org,
        protected string $securityProduct,
        protected string $enablement,
    ) {}
}
