<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageForOrg;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageVersionForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageVersionForOrg;
use Oneduo\GitHubSdk\Requests\Packages\PackagesDeletePackageVersionForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByOrg;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageForOrganization;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageVersionForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageVersionForOrganization;
use Oneduo\GitHubSdk\Requests\Packages\PackagesGetPackageVersionForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForOrganization;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListPackagesForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListPackagesForOrganization;
use Oneduo\GitHubSdk\Requests\Packages\PackagesListPackagesForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageForOrg;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageForUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageVersionForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageVersionForOrg;
use Oneduo\GitHubSdk\Requests\Packages\PackagesRestorePackageVersionForUser;
use Saloon\Http\Response;

class Packages extends GitHubResource
{
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function listDockerMigrationConflictingPackagesForOrganization(string $org): Response
    {
        return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForOrganization($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $visibility  The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
     *
     * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
     * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPackagesForOrganization(
        string $org,
        string $packageType,
        ?string $visibility,
        ?int $page,
    ): Response {
        return $this->connector->send(new PackagesListPackagesForOrganization($org, $packageType, $visibility, $page));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getPackageForOrganization(string $packageType, string $packageName, string $org): Response
    {
        return $this->connector->send(new PackagesGetPackageForOrganization($packageType, $packageName, $org));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function deletePackageForOrg(string $packageType, string $packageName, string $org): Response
    {
        return $this->connector->send(new PackagesDeletePackageForOrg($packageType, $packageName, $org));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $token  package token
     */
    public function restorePackageForOrg(
        string $packageType,
        string $packageName,
        string $org,
        ?string $token,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageForOrg($packageType, $packageName, $org, $token));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $state  The state of the package, either active or deleted.
     */
    public function getAllPackageVersionsForPackageOwnedByOrg(
        string $packageType,
        string $packageName,
        string $org,
        ?int $page,
        ?string $state,
    ): Response {
        return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByOrg($packageType, $packageName, $org, $page, $state));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function getPackageVersionForOrganization(
        string $packageType,
        string $packageName,
        string $org,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesGetPackageVersionForOrganization($packageType, $packageName, $org, $packageVersionId));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function deletePackageVersionForOrg(
        string $packageType,
        string $packageName,
        string $org,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesDeletePackageVersionForOrg($packageType, $packageName, $org, $packageVersionId));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function restorePackageVersionForOrg(
        string $packageType,
        string $packageName,
        string $org,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageVersionForOrg($packageType, $packageName, $org, $packageVersionId));
    }

    public function listDockerMigrationConflictingPackagesForAuthenticatedUser(): Response
    {
        return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser);
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $visibility  The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
     *
     * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
     * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPackagesForAuthenticatedUser(
        string $packageType,
        ?string $visibility,
        ?int $page,
    ): Response {
        return $this->connector->send(new PackagesListPackagesForAuthenticatedUser($packageType, $visibility, $page));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     */
    public function getPackageForAuthenticatedUser(string $packageType, string $packageName): Response
    {
        return $this->connector->send(new PackagesGetPackageForAuthenticatedUser($packageType, $packageName));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     */
    public function deletePackageForAuthenticatedUser(string $packageType, string $packageName): Response
    {
        return $this->connector->send(new PackagesDeletePackageForAuthenticatedUser($packageType, $packageName));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $token  package token
     */
    public function restorePackageForAuthenticatedUser(
        string $packageType,
        string $packageName,
        ?string $token,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageForAuthenticatedUser($packageType, $packageName, $token));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $state  The state of the package, either active or deleted.
     */
    public function getAllPackageVersionsForPackageOwnedByAuthenticatedUser(
        string $packageType,
        string $packageName,
        ?int $page,
        ?string $state,
    ): Response {
        return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser($packageType, $packageName, $page, $state));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function getPackageVersionForAuthenticatedUser(
        string $packageType,
        string $packageName,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesGetPackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function deletePackageVersionForAuthenticatedUser(
        string $packageType,
        string $packageName,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesDeletePackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function restorePackageVersionForAuthenticatedUser(
        string $packageType,
        string $packageName,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function listDockerMigrationConflictingPackagesForUser(string $username): Response
    {
        return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForUser($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $visibility  The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
     *
     * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
     * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPackagesForUser(
        string $username,
        string $packageType,
        ?string $visibility,
        ?int $page,
    ): Response {
        return $this->connector->send(new PackagesListPackagesForUser($username, $packageType, $visibility, $page));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getPackageForUser(string $packageType, string $packageName, string $username): Response
    {
        return $this->connector->send(new PackagesGetPackageForUser($packageType, $packageName, $username));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function deletePackageForUser(string $packageType, string $packageName, string $username): Response
    {
        return $this->connector->send(new PackagesDeletePackageForUser($packageType, $packageName, $username));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $token  package token
     */
    public function restorePackageForUser(
        string $packageType,
        string $packageName,
        string $username,
        ?string $token,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageForUser($packageType, $packageName, $username, $token));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getAllPackageVersionsForPackageOwnedByUser(
        string $packageType,
        string $packageName,
        string $username,
    ): Response {
        return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByUser($packageType, $packageName, $username));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getPackageVersionForUser(
        string $packageType,
        string $packageName,
        int $packageVersionId,
        string $username,
    ): Response {
        return $this->connector->send(new PackagesGetPackageVersionForUser($packageType, $packageName, $packageVersionId, $username));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function deletePackageVersionForUser(
        string $packageType,
        string $packageName,
        string $username,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesDeletePackageVersionForUser($packageType, $packageName, $username, $packageVersionId));
    }

    /**
     * @param  string  $packageType  The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName  The name of the package.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $packageVersionId  Unique identifier of the package version.
     */
    public function restorePackageVersionForUser(
        string $packageType,
        string $packageName,
        string $username,
        int $packageVersionId,
    ): Response {
        return $this->connector->send(new PackagesRestorePackageVersionForUser($packageType, $packageName, $username, $packageVersionId));
    }
}
