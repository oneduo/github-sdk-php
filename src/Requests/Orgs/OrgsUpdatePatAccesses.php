<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-pat-accesses
 *
 * Updates the access organization members have to organization resources via fine-grained personal
 * access tokens. Limited to revoking a token's existing access.
 *
 * Only GitHub Apps can use this
 * endpoint.
 */
class OrgsUpdatePatAccesses extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/personal-access-tokens";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
