<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/delete-package-for-user
 *
 * Deletes an entire package for a user. You cannot delete a public package if any version of the
 * package has more than 5,000 downloads. In this scenario, contact GitHub support for further
 * assistance.
 *
 * If the `package_type` belongs to a GitHub Packages registry that supports granular
 * permissions, the authenticated user must have admin permissions to the package. For the list of
 * these registries, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `read:packages` and `delete:packages`
 * scopes to use this endpoint. For more information, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesDeletePackageForUser extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/users/{$this->username}/packages/{$this->packageType}/{$this->packageName}";
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected string $username,
    ) {}
}
