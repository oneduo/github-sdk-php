<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesAddRepositoryForSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesAddSelectedRepoToOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCheckPermissionsForDevcontainer;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCodespaceMachinesForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateOrUpdateOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateOrUpdateRepoSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateOrUpdateSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateWithPrForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesCreateWithRepoForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteCodespacesAccessUsers;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteFromOrganization;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteRepoSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesDeleteSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesExportForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetCodespacesForUserInOrg;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetExportDetailsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetOrgPublicKey;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetPublicKeyForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetRepoPublicKey;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetRepoSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesGetSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListDevcontainersInRepositoryForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListInOrganization;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListInRepositoryForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListOrgSecrets;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListRepoSecrets;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListRepositoriesForSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListSecretsForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesListSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesPreFlightWithRepoForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesPublishForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesRemoveRepositoryForSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesRemoveSelectedRepoFromOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesRepoMachinesForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesSetCodespacesAccess;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesSetCodespacesAccessUsers;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesSetRepositoriesForSecretForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesSetSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesStartForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesStopForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesStopInOrganization;
use Oneduo\GitHubSdk\Requests\Codespaces\CodespacesUpdateForAuthenticatedUser;
use Saloon\Http\Response;

class Codespaces extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListInOrganization(string $org, ?int $page): Response {
        return $this->connector->send(new CodespacesListInOrganization($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function codespacesSetCodespacesAccess(string $org): Response {
        return $this->connector->send(new CodespacesSetCodespacesAccess($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function codespacesSetCodespacesAccessUsers(string $org): Response {
        return $this->connector->send(new CodespacesSetCodespacesAccessUsers($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function codespacesDeleteCodespacesAccessUsers(string $org): Response {
        return $this->connector->send(new CodespacesDeleteCodespacesAccessUsers($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListOrgSecrets(string $org, ?int $page): Response {
        return $this->connector->send(new CodespacesListOrgSecrets($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function codespacesGetOrgPublicKey(string $org): Response {
        return $this->connector->send(new CodespacesGetOrgPublicKey($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesGetOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new CodespacesGetOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesCreateOrUpdateOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new CodespacesCreateOrUpdateOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesDeleteOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new CodespacesDeleteOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListSelectedReposForOrgSecret(string $org, string $secretName, ?int $page): Response {
        return $this->connector->send(new CodespacesListSelectedReposForOrgSecret($org, $secretName, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesSetSelectedReposForOrgSecret(string $org, string $secretName): Response {
        return $this->connector->send(new CodespacesSetSelectedReposForOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesAddSelectedRepoToOrgSecret(string $org, string $secretName, int $repositoryId): Response {
        return $this->connector->send(new CodespacesAddSelectedRepoToOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesRemoveSelectedRepoFromOrgSecret(
        string $org,
        string $secretName,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new CodespacesRemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesGetCodespacesForUserInOrg(string $org, string $username, ?int $page): Response {
        return $this->connector->send(new CodespacesGetCodespacesForUserInOrg($org, $username, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesDeleteFromOrganization(string $org, string $username, string $codespaceName): Response {
        return $this->connector->send(new CodespacesDeleteFromOrganization($org, $username, $codespaceName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesStopInOrganization(string $org, string $username, string $codespaceName): Response {
        return $this->connector->send(new CodespacesStopInOrganization($org, $username, $codespaceName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListInRepositoryForAuthenticatedUser(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new CodespacesListInRepositoryForAuthenticatedUser($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function codespacesCreateWithRepoForAuthenticatedUser(string $owner, string $repo): Response {
        return $this->connector->send(new CodespacesCreateWithRepoForAuthenticatedUser($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListDevcontainersInRepositoryForAuthenticatedUser(
        string $owner,
        string $repo,
        ?int $page,
    ): Response {
        return $this->connector->send(new CodespacesListDevcontainersInRepositoryForAuthenticatedUser($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $location  The location to check for available machines. Assigned by IP if not provided.
     * @param  string  $clientIp  IP for location auto-detection when proxying a request
     * @param  string  $ref  The branch or commit to check for prebuild availability and devcontainer restrictions.
     */
    public function codespacesRepoMachinesForAuthenticatedUser(
        string $owner,
        string $repo,
        ?string $location,
        ?string $clientIp,
        ?string $ref,
    ): Response {
        return $this->connector->send(new CodespacesRepoMachinesForAuthenticatedUser($owner, $repo, $location, $clientIp, $ref));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The branch or commit to check for a default devcontainer path. If not specified, the default branch will be checked.
     * @param  string  $clientIp  An alternative IP for default location auto-detection, such as when proxying a request.
     */
    public function codespacesPreFlightWithRepoForAuthenticatedUser(
        string $owner,
        string $repo,
        ?string $ref,
        ?string $clientIp,
    ): Response {
        return $this->connector->send(new CodespacesPreFlightWithRepoForAuthenticatedUser($owner, $repo, $ref, $clientIp));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $ref  The git reference that points to the location of the devcontainer configuration to use for the permission check. The value of `ref` will typically be a branch name (`heads/BRANCH_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  string  $devcontainerPath  Path to the devcontainer.json configuration to use for the permission check.
     */
    public function codespacesCheckPermissionsForDevcontainer(
        string $owner,
        string $repo,
        string $ref,
        string $devcontainerPath,
    ): Response {
        return $this->connector->send(new CodespacesCheckPermissionsForDevcontainer($owner, $repo, $ref, $devcontainerPath));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListRepoSecrets(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new CodespacesListRepoSecrets($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function codespacesGetRepoPublicKey(string $owner, string $repo): Response {
        return $this->connector->send(new CodespacesGetRepoPublicKey($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesGetRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new CodespacesGetRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesCreateOrUpdateRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new CodespacesCreateOrUpdateRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesDeleteRepoSecret(string $owner, string $repo, string $secretName): Response {
        return $this->connector->send(new CodespacesDeleteRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function codespacesCreateWithPrForAuthenticatedUser(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new CodespacesCreateWithPrForAuthenticatedUser($owner, $repo, $pullNumber));
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $repositoryId  ID of the Repository to filter on
     */
    public function codespacesListForAuthenticatedUser(?int $page, ?int $repositoryId): Response {
        return $this->connector->send(new CodespacesListForAuthenticatedUser($page, $repositoryId));
    }

    public function codespacesCreateForAuthenticatedUser(): Response {
        return $this->connector->send(new CodespacesCreateForAuthenticatedUser);
    }

    /**
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function codespacesListSecretsForAuthenticatedUser(?int $page): Response {
        return $this->connector->send(new CodespacesListSecretsForAuthenticatedUser($page));
    }

    public function codespacesGetPublicKeyForAuthenticatedUser(): Response {
        return $this->connector->send(new CodespacesGetPublicKeyForAuthenticatedUser);
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesGetSecretForAuthenticatedUser(string $secretName): Response {
        return $this->connector->send(new CodespacesGetSecretForAuthenticatedUser($secretName));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesCreateOrUpdateSecretForAuthenticatedUser(string $secretName): Response {
        return $this->connector->send(new CodespacesCreateOrUpdateSecretForAuthenticatedUser($secretName));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesDeleteSecretForAuthenticatedUser(string $secretName): Response {
        return $this->connector->send(new CodespacesDeleteSecretForAuthenticatedUser($secretName));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesListRepositoriesForSecretForAuthenticatedUser(string $secretName): Response {
        return $this->connector->send(new CodespacesListRepositoriesForSecretForAuthenticatedUser($secretName));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesSetRepositoriesForSecretForAuthenticatedUser(string $secretName): Response {
        return $this->connector->send(new CodespacesSetRepositoriesForSecretForAuthenticatedUser($secretName));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesAddRepositoryForSecretForAuthenticatedUser(string $secretName, int $repositoryId): Response {
        return $this->connector->send(new CodespacesAddRepositoryForSecretForAuthenticatedUser($secretName, $repositoryId));
    }

    /**
     * @param  string  $secretName  The name of the secret.
     */
    public function codespacesRemoveRepositoryForSecretForAuthenticatedUser(
        string $secretName,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new CodespacesRemoveRepositoryForSecretForAuthenticatedUser($secretName, $repositoryId));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesGetForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesGetForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesDeleteForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesDeleteForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesUpdateForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesUpdateForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesExportForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesExportForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     * @param  string  $exportId  The ID of the export operation, or `latest`. Currently only `latest` is currently supported.
     */
    public function codespacesGetExportDetailsForAuthenticatedUser(string $codespaceName, string $exportId): Response {
        return $this->connector->send(new CodespacesGetExportDetailsForAuthenticatedUser($codespaceName, $exportId));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesCodespaceMachinesForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesCodespaceMachinesForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesPublishForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesPublishForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesStartForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesStartForAuthenticatedUser($codespaceName));
    }

    /**
     * @param  string  $codespaceName  The name of the codespace.
     */
    public function codespacesStopForAuthenticatedUser(string $codespaceName): Response {
        return $this->connector->send(new CodespacesStopForAuthenticatedUser($codespaceName));
    }
}
