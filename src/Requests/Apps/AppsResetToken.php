<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/reset-token
 *
 * OAuth applications and GitHub applications with OAuth authorizations can use this API method to
 * reset a valid OAuth token without end-user involvement. Applications must save the "token" property
 * in the response because changes take effect immediately. Invalid tokens will return `404 NOT FOUND`.
 */
class AppsResetToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
