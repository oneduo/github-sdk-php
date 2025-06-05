<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/get-global-advisory
 *
 * Gets a global security advisory using its GitHub Security Advisory (GHSA) identifier.
 */
class SecurityAdvisoriesGetGlobalAdvisory extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/advisories/{$this->ghsaId}";
    }

    /**
     * @param  string  $ghsaId  The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function __construct(
        protected string $ghsaId,
    ) {}
}
