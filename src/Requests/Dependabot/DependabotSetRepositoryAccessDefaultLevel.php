<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/set-repository-access-default-level
 *
 * > [!NOTE]
 * >    This operation supports both server-to-server and user-to-server access.
 * Sets the
 * default level of repository access Dependabot will have while performing an update.  Available
 * values are:
 * - 'public' - Dependabot will only have access to public repositories, unless access is
 * explicitly granted to non-public repositories.
 * - 'internal' - Dependabot will only have access to
 * public and internal repositories, unless access is explicitly granted to private
 * repositories.
 *
 * Unauthorized users will not see the existence of this endpoint.
 */
class DependabotSetRepositoryAccessDefaultLevel extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/organizations/{$this->org}/dependabot/repository-access/default-level";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
