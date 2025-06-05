<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-pages-deployment
 *
 * Gets the current status of a GitHub Pages deployment.
 *
 * The authenticated user must have read
 * permission for the GitHub Pages site.
 */
class ReposGetPagesDeployment extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pages/deployments/{$this->pagesDeploymentId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  mixed  $pagesDeploymentId  The ID of the Pages deployment. You can also give the commit SHA of the deployment.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected mixed $pagesDeploymentId,
    ) {}
}
