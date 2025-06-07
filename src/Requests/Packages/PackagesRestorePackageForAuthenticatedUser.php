<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Packages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * packages/restore-package-for-authenticated-user
 *
 * Restores a package owned by the authenticated user.
 *
 * You can restore a deleted package under the
 * following conditions:
 *   - The package was deleted within the last 30 days.
 *   - The same package
 * namespace and version is still available and not reused for a new package. If the same package
 * namespace is not available, you will not be able to restore your package. In this scenario, to
 * restore the deleted package, you must delete the new package that uses the deleted package's
 * namespace first.
 *
 * OAuth app tokens and personal access tokens (classic) need the `read:packages` and
 * `write:packages` scopes to use this endpoint. For more information, see "[About permissions for
 * GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesRestorePackageForAuthenticatedUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/user/packages/{$this->packageType}/{$this->packageName}/restore";
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  null|string  $token  package token
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected ?string $token = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['token' => $this->token]);
    }
}
