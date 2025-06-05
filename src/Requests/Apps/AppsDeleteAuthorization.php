<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/delete-authorization
 *
 * OAuth and GitHub application owners can revoke a grant for their application and a specific user.
 * You must provide a valid OAuth `access_token` as an input parameter and the grant for the token's
 * owner will be deleted.
 * Deleting an application's grant will also delete all OAuth tokens associated
 * with the application for the user. Once deleted, the application will have no access to the user's
 * account and will no longer be listed on [the application authorizations settings screen within
 * GitHub](https://github.com/settings/applications#authorized).
 */
class AppsDeleteAuthorization extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/applications/{$this->clientId}/grant";
    }

    /**
     * @param  string  $clientId  The client ID of the GitHub app.
     */
    public function __construct(
        protected string $clientId,
    ) {}
}
