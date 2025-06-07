<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-all-deployment-protection-rules
 *
 * Gets all custom deployment protection rules that are enabled for an environment. Anyone with read
 * access to the repository can use this endpoint. For more information about environments, see "[Using
 * environments for
 * deployment](https://docs.github.com/actions/deployment/targeting-different-environments/using-environments-for-deployment)."
 *
 * For
 * more information about the app that is providing this custom deployment rule, see the [documentation
 * for the `GET /apps/{app_slug}` endpoint](https://docs.github.com/rest/apps/apps#get-an-app).
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint with a
 * private repository.
 */
class ReposGetAllDeploymentProtectionRules extends Request
{
    protected Method $method = Method::GET;

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
