<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-in-repository-for-authenticated-user
 *
 * Lists the codespaces associated to a specified repository and the authenticated user.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `codespace` scope to use this endpoint.
 */
class CodespacesListInRepositoryForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/codespaces";
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
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
