<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/review-pat-grant-requests-in-bulk
 *
 * Approves or denies multiple pending requests to access organization resources via a fine-grained
 * personal access token.
 *
 * Only GitHub Apps can use this endpoint.
 */
class OrgsReviewPatGrantRequestsInBulk extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/personal-access-token-requests";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
