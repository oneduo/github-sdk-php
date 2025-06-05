<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-selected-repos-for-org-variable
 *
 * Lists all repositories that can access an organization variable
 * that is available to selected
 * repositories.
 *
 * Authenticated users must have collaborator access to a repository to create, update,
 * or read variables.
 *
 * OAuth app tokens and personal access tokens (classic) need the `admin:org` scope
 * to use this endpoint. If the repository is private, the `repo` scope is also required.
 */
class ActionsListSelectedReposForOrgVariable extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/variables/{$this->name}/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $name  The name of the variable.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $name,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
