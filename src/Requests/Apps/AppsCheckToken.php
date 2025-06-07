<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/check-token
 *
 * OAuth applications and GitHub applications with OAuth authorizations can use this API method for
 * checking OAuth token validity without exceeding the normal rate limits for failed login attempts.
 * Authentication works differently with this particular endpoint. Invalid tokens will return `404 NOT
 * FOUND`.
 */
class AppsCheckToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/applications/{$this->clientId}/token";
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function __construct(
        protected string $clientId,
    ) {}
}
