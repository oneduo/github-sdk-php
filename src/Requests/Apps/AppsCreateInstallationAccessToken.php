<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/create-installation-access-token
 *
 * Creates an installation access token that enables a GitHub App to make authenticated API requests
 * for the app's installation on an organization or individual account. Installation tokens expire one
 * hour from the time you create them. Using an expired token produces a status code of `401 -
 * Unauthorized`, and requires creating a new installation token. By default the installation token has
 * access to all repositories that the installation can access.
 *
 * Optionally, you can use the
 * `repositories` or `repository_ids` body parameters to specify individual repositories that the
 * installation access token can access. If you don't use `repositories` or `repository_ids` to grant
 * access to specific repositories, the installation access token will have access to all repositories
 * that the installation was granted access to. The installation access token cannot be granted access
 * to repositories that the installation was not granted access to. Up to 500 repositories can be
 * listed in this manner.
 *
 * Optionally, use the `permissions` body parameter to specify the permissions
 * that the installation access token should have. If `permissions` is not specified, the installation
 * access token will have all of the permissions that were granted to the app. The installation access
 * token cannot be granted permissions that the app was not granted.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsCreateInstallationAccessToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/app/installations/{$this->installationId}/access_tokens";
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function __construct(
        protected int $installationId,
    ) {}
}
