<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-deployments
 *
 * Simple filtering of deployments is available via query parameters:
 */
class ReposListDeployments extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/deployments";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $sha  The SHA recorded at creation time.
     * @param  null|string  $ref  The name of the ref. This can be a branch, tag, or SHA.
     * @param  null|string  $task  The name of the task for the deployment (e.g., `deploy` or `deploy:migrations`).
     * @param  null|string  $environment  The name of the environment that was deployed to (e.g., `staging` or `production`).
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $sha = null,
        protected ?string $ref = null,
        protected ?string $task = null,
        protected ?string $environment = null,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'sha' => $this->sha,
            'ref' => $this->ref,
            'task' => $this->task,
            'environment' => $this->environment,
            'page' => $this->page,
        ]);
    }
}
