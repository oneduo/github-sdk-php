<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-pat-access
 *
 * Updates the access an organization member has to organization resources via a fine-grained personal
 * access token. Limited to revoking the token's existing access. Limited to revoking a token's
 * existing access.
 *
 * Only GitHub Apps can use this endpoint.
 */
class OrgsUpdatePatAccess extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/personal-access-tokens/{$this->patId}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $patId  The unique identifier of the fine-grained personal access token.
     */
    public function __construct(
        protected string $org,
        protected int $patId,
    ) {}
}
