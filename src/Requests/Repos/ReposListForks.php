<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-forks
 */
class ReposListForks extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/forks";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|string  $sort  The sort order. `stargazers` will sort by star count.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $sort = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['sort' => $this->sort, 'page' => $this->page]);
    }
}
