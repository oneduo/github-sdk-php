<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-for-org
 *
 * Lists repositories for the specified organization.
 *
 * > [!NOTE]
 * > In order to see the
 * `security_and_analysis` block for a repository you must have admin permissions for the repository or
 * be an owner or security manager for the organization that owns the repository. For more information,
 * see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 */
class ReposListForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/repos";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $type  Specifies the types of repositories you want returned.
     * @param  null|string  $sort  The property to sort the results by.
     * @param  null|string  $direction  The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?string $type = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['type' => $this->type, 'sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page]);
    }
}
