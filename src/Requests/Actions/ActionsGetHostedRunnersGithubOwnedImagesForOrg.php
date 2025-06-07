<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-hosted-runners-github-owned-images-for-org
 *
 * Get the list of GitHub-owned images available for GitHub-hosted runners for an organization.
 */
class ActionsGetHostedRunnersGithubOwnedImagesForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/hosted-runners/images/github-owned";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
