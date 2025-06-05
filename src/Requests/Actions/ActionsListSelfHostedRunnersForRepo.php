<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-self-hosted-runners-for-repo
 *
 * Lists all self-hosted runners configured in a repository.
 *
 * Authenticated users must have admin
 * access to the repository to use this endpoint.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class ActionsListSelfHostedRunnersForRepo extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $name  The name of a self-hosted runner.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $name = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['name' => $this->name, 'page' => $this->page]);
    }
}
