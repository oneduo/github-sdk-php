<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/repository-access-for-org
 *
 * > [!NOTE]
 * >    This operation supports both server-to-server and user-to-server access.
 * Unauthorized
 * users will not see the existence of this endpoint.
 */
class DependabotRepositoryAccessForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/organizations/{$this->org}/dependabot/repository-access";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
