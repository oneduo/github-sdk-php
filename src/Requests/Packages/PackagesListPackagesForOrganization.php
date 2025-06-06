<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-packages-for-organization
 *
 * Lists packages in an organization readable by the user.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `read:packages` scope to use this endpoint. For more information, see "[About
 * permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesListPackagesForOrganization extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/packages";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  null|string  $visibility  The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
     *
     * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
     * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected string $packageType,
        protected ?string $visibility = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['package_type' => $this->packageType, 'visibility' => $this->visibility, 'page' => $this->page, 'per_page' => $this->perPage]);
    }
}
