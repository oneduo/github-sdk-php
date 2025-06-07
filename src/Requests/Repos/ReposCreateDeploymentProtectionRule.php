<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-deployment-protection-rule
 *
 * Enable a custom deployment protection rule for an environment.
 *
 * The authenticated user must have
 * admin or owner permissions to the repository to use this endpoint.
 *
 * For more information about the
 * app that is providing this custom deployment rule, see the [documentation for the `GET
 * /apps/{app_slug}` endpoint](https://docs.github.com/rest/apps/apps#get-an-app), as well as the
 * [guide to creating custom deployment protection
 * rules](https://docs.github.com/actions/managing-workflow-runs-and-deployments/managing-deployments/creating-custom-deployment-protection-rules).
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class ReposCreateDeploymentProtectionRule extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules";
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     */
    public function __construct(
        protected string $environmentName,
        protected string $repo,
        protected string $owner,
    ) {}
}
