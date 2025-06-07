<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/get-package-version-for-authenticated-user
 *
 * Gets a specific package version for a package owned by the authenticated user.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `read:packages` scope to use this endpoint. For more
 * information, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesGetPackageVersionForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/packages/{$this->packageType}/{$this->packageName}/versions/{$this->packageVersionId}";
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected int $packageVersionId,
    ) {}
}
