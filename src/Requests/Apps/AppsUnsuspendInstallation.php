<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/unsuspend-installation
 *
 * Removes a GitHub App installation suspension.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsUnsuspendInstallation extends Request
{
    protected Method $method = Method::DELETE;

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
