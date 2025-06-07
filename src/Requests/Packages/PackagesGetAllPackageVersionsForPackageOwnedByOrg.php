<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/get-all-package-versions-for-package-owned-by-org
 *
 * Lists package versions for a package owned by an organization.
 *
 * OAuth app tokens and personal access
 * tokens (classic) need the `read:packages` scope to use this endpoint. For more information, see
 * "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesGetAllPackageVersionsForPackageOwnedByOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/packages/{$this->packageType}/{$this->packageName}/versions";
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $state  The state of the package, either active or deleted.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected string $org,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $state = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page,
            'per_page' => $this->perPage, 'state' => $this->state]);
    }
}
