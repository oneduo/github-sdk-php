<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/delete
 *
 * Deletes an organization and all its repositories.
 *
 * The organization login will be unavailable for 90
 * days after deletion.
 *
 * Please review the Terms of Service regarding account deletion before using
 * this endpoint:
 *
 * https://docs.github.com/site-policy/github-terms/github-terms-of-service
 */
class OrgsDelete extends Request {
    protected Method $method = Method::DELETE;

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
