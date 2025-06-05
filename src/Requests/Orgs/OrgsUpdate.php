<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update
 *
 * > [!WARNING]
 * > **Closing down notice:** GitHub will replace and discontinue
 * `members_allowed_repository_creation_type` in favor of more granular permissions. The new input
 * parameters are `members_can_create_public_repositories`, `members_can_create_private_repositories`
 * for all organizations and `members_can_create_internal_repositories` for organizations associated
 * with an enterprise account using GitHub Enterprise Cloud or GitHub Enterprise Server 2.20+. For more
 * information, see the [blog
 * post](https://developer.github.com/changes/2019-12-03-internal-visibility-changes).
 *
 * > [!WARNING]
 * >
 * **Closing down notice:** Code security product enablement for new repositories through the
 * organization API is closing down. Please use [code security
 * configurations](https://docs.github.com/rest/code-security/configurations#set-a-code-security-configuration-as-a-default-for-an-organization)
 * to set defaults instead. For more information on setting a default security configuration, see the
 * [changelog](https://github.blog/changelog/2024-07-09-sunsetting-security-settings-defaults-parameters-in-the-organizations-rest-api/).
 *
 * Updates
 * the organization's profile and member privileges.
 *
 * The authenticated user must be an organization
 * owner to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:org` or `repo` scope to use this endpoint.
 */
class OrgsUpdate extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
