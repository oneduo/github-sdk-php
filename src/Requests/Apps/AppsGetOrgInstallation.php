<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-org-installation
 *
 * Enables an authenticated GitHub App to find the organization's installation information.
 *
 * You must
 * use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsGetOrgInstallation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/installation";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
