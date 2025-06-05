<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-selected-repositories-enabled-github-actions-organization
 *
 * Lists the selected repositories that are enabled for GitHub Actions in an organization. To use this
 * endpoint, the organization permission policy for `enabled_repositories` must be configured to
 * `selected`. For more information, see "[Set GitHub Actions permissions for an
 * organization](#set-github-actions-permissions-for-an-organization)."
 *
 * OAuth app tokens and personal
 * access tokens (classic) need the `admin:org` scope to use this endpoint.
 */
class ActionsListSelectedRepositoriesEnabledGithubActionsOrganization extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/actions/permissions/repositories";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page, 'per_page' => $this->perPage]);
    }
}
