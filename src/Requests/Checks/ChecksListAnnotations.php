<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/list-annotations
 *
 * Lists annotations for a check run using the annotation `id`.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `repo` scope to use this endpoint on a private repository.
 */
class ChecksListAnnotations extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/check-runs/{$this->checkRunId}/annotations";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkRunId,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
