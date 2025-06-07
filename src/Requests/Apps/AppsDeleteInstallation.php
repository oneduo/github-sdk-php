<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/delete-installation
 *
 * Uninstalls a GitHub App on a user, organization, or business account. If you prefer to temporarily
 * suspend an app's access to your account's resources, then we recommend the "[Suspend an app
 * installation](https://docs.github.com/rest/apps/apps#suspend-an-app-installation)" endpoint.
 *
 * You
 * must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsDeleteInstallation extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/app/installations/{$this->installationId}";
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function __construct(
        protected int $installationId,
    ) {}
}
