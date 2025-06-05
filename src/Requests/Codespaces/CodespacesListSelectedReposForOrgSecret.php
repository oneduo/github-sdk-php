<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-selected-repos-for-org-secret
 *
 * Lists all repositories that have been selected when the `visibility`
 * for repository access to a
 * secret is set to `selected`.
 *
 * OAuth app tokens and personal access tokens (classic) need the
 * `admin:org` scope to use this endpoint.
 */
class CodespacesListSelectedReposForOrgSecret extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/codespaces/secrets/{$this->secretName}/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $secretName,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
