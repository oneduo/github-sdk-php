<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-installations-for-authenticated-user
 *
 * Lists installations of your GitHub App that the authenticated user has explicit permission (`:read`,
 * `:write`, or `:admin`) to access.
 *
 * The authenticated user has explicit permission to access
 * repositories they own, repositories where they are a collaborator, and repositories that they can
 * access through an organization membership.
 *
 * You can find the permissions for the installation under
 * the `permissions` key.
 */
class AppsListInstallationsForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/user/installations';
    }

    /**
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
