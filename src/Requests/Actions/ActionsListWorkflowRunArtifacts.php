<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-workflow-run-artifacts
 *
 * Lists artifacts for a workflow run.
 *
 * Anyone with read access to the repository can use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint with a private repository.
 */
class ActionsListWorkflowRunArtifacts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/artifacts";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runId  The unique identifier of the workflow run.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $name  The name field of an artifact. When specified, only artifacts with this name will be returned.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runId,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $name = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'name' => $this->name]);
    }
}
