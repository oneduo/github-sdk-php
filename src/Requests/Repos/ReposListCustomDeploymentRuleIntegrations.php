<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-custom-deployment-rule-integrations
 *
 * Gets all custom deployment protection rule integrations that are available for an environment.
 *
 * The
 * authenticated user must have admin or owner permissions to the repository to use this endpoint.
 *
 * For
 * more information about environments, see "[Using environments for
 * deployment](https://docs.github.com/actions/deployment/targeting-different-environments/using-environments-for-deployment)."
 *
 * For
 * more information about the app that is providing this custom deployment rule, see "[GET an
 * app](https://docs.github.com/rest/apps/apps#get-an-app)".
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint with a private repository.
 */
class ReposListCustomDeploymentRuleIntegrations extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules/apps";
    }

    /**
     * @param  string  $environmentName  The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $environmentName,
        protected string $repo,
        protected string $owner,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
