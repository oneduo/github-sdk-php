<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/cancel-pages-deployment
 *
 * Cancels a GitHub Pages deployment.
 *
 * The authenticated user must have write permissions for the
 * GitHub Pages site.
 */
class ReposCancelPagesDeployment extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/pages/deployments/{$this->pagesDeploymentId}/cancel";
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
