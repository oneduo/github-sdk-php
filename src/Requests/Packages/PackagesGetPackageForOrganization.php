<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/get-package-for-organization
 *
 * Gets a specific package in an organization.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need the `read:packages` scope to use this endpoint. For more information, see "[About permissions
 * for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesGetPackageForOrganization extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/packages/{$this->packageType}/{$this->packageName}";
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected string $org,
    ) {}
}
