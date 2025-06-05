<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-teams
 *
 * Lists the teams that have access to the specified repository and that are also visible to the
 * authenticated user.
 *
 * For a public repository, a team is listed only if that team added the public
 * repository explicitly.
 *
 * OAuth app tokens and personal access tokens (classic) need the `public_repo`
 * or `repo` scope to use this endpoint with a public repository, and `repo` scope to use this endpoint
 * with a private repository.
 */
class ReposListTeams extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/teams";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
