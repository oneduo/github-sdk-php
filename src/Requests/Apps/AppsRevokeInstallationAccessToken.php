<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/revoke-installation-access-token
 *
 * Revokes the installation token you're using to authenticate as an installation and access this
 * endpoint.
 *
 * Once an installation token is revoked, the token is invalidated and cannot be used. Other
 * endpoints that require the revoked installation token must have a new installation token to work.
 * You can create a new token using the "[Create an installation access token for an
 * app](https://docs.github.com/rest/apps/apps#create-an-installation-access-token-for-an-app)"
 * endpoint.
 */
class AppsRevokeInstallationAccessToken extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return '/installation/token';
    }

    public function __construct() {}
}
