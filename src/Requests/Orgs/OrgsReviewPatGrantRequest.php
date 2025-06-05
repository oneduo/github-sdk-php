<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/review-pat-grant-request
 *
 * Approves or denies a pending request to access organization resources via a fine-grained personal
 * access token.
 *
 * Only GitHub Apps can use this endpoint.
 */
class OrgsReviewPatGrantRequest extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/personal-access-token-requests/{$this->patRequestId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patRequestId  Unique identifier of the request for access via fine-grained personal access token.
     */
    public function __construct(
        protected string $org,
        protected int $patRequestId,
    ) {}
}
