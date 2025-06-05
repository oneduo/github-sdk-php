<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * dependabot/update-repository-access-for-org
 *
 * > [!NOTE]
 * >    This operation supports both server-to-server and user-to-server access.
 * Unauthorized
 * users will not see the existence of this endpoint.
 */
class DependabotUpdateRepositoryAccessForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
