<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-installation
 *
 * Enables an authenticated GitHub App to find an installation's information using the installation
 * id.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsGetInstallation extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/app/installations/{$this->installationId}";
    }

    /**
     * @param  int  $installationId  The unique identifier of the installation.
     */
    public function __construct(
        protected int $installationId,
    ) {}
}
