<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/suspend-installation
 *
 * Suspends a GitHub App on a user, organization, or business account, which blocks the app from
 * accessing the account's resources. When a GitHub App is suspended, the app's access to the GitHub
 * API or webhook events is blocked for that account.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsSuspendInstallation extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/app/installations/{$this->installationId}/suspended";
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function __construct(
        protected int $installationId,
    ) {}
}
