<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Codespaces;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-secrets-for-authenticated-user
 *
 * Lists all development environment secrets available for a user's codespaces without revealing
 * their
 * encrypted values.
 *
 * The authenticated user must have Codespaces access to use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `codespace` or
 * `codespace:secrets` scope to use this endpoint.
 */
class CodespacesListSecretsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/codespaces/secrets';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
