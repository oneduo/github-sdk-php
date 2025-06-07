<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotAddSelectedRepoToOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotCreateOrUpdateOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotCreateOrUpdateRepoSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotDeleteOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotDeleteRepoSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotGetAlert;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotGetOrgPublicKey;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotGetOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotGetRepoPublicKey;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotGetRepoSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListAlertsForEnterprise;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListAlertsForOrg;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListAlertsForRepo;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListOrgSecrets;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListRepoSecrets;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotListSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotRemoveSelectedRepoFromOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotRepositoryAccessForOrg;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotSetRepositoryAccessDefaultLevel;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotSetSelectedReposForOrgSecret;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotUpdateAlert;
use Oneduo\GitHubSdk\Requests\Dependabot\DependabotUpdateRepositoryAccessForOrg;
use Saloon\Http\Response;

class Dependabot extends GitHubResource
{
    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  string  $state  A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity  A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem  A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package  A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $epssPercentage  CVE Exploit Prediction Scoring System (EPSS) percentage. Can be specified as:
     *                                  - An exact number (`n`)
     *                                  - Comparators such as `>n`, `<n`, `>=n`, `<=n`
     *                                  - A range like `n..n`, where `n` is a number from 0.0 to 1.0
     *
     * Filters the list of alerts based on EPSS percentages. If specified, only alerts with the provided EPSS percentages will be returned.
     * @param  mixed  $has  Filters the list of alerts based on whether the alert has the given value. If specified, only alerts meeting this criterion will be returned.
     *                      Multiple `has` filters can be passed to filter for alerts that have all of the values. Currently, only `patch` is supported.
     * @param  string  $scope  The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort  The property by which to sort the results.
     *                        `created` means when the alert was created.
     *                        `updated` means when the alert's state last changed.
     *                        `epss_percentage` sorts alerts by the Exploit Prediction Scoring System (EPSS) percentage.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $first  **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     *                      This parameter must not be used in combination with `last`.
     *                      Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last  **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     *                     This parameter must not be used in combination with `first`.
     *                     Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function listAlertsForEnterprise(
        string $enterprise,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $epssPercentage,
        mixed $has,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForEnterprise($enterprise, $state, $severity, $ecosystem, $package, $epssPercentage, $has, $scope, $sort, $direction, $before, $first, $last));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function repositoryAccessForOrg(string $org): Response
    {
        return $this->connector->send(new DependabotRepositoryAccessForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function updateRepositoryAccessForOrg(string $org): Response
    {
        return $this->connector->send(new DependabotUpdateRepositoryAccessForOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function setRepositoryAccessDefaultLevel(string $org): Response
    {
        return $this->connector->send(new DependabotSetRepositoryAccessDefaultLevel($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $state  A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity  A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem  A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package  A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $epssPercentage  CVE Exploit Prediction Scoring System (EPSS) percentage. Can be specified as:
     *                                  - An exact number (`n`)
     *                                  - Comparators such as `>n`, `<n`, `>=n`, `<=n`
     *                                  - A range like `n..n`, where `n` is a number from 0.0 to 1.0
     *
     * Filters the list of alerts based on EPSS percentages. If specified, only alerts with the provided EPSS percentages will be returned.
     * @param  mixed  $has  Filters the list of alerts based on whether the alert has the given value. If specified, only alerts meeting this criterion will be returned.
     *                      Multiple `has` filters can be passed to filter for alerts that have all of the values. Currently, only `patch` is supported.
     * @param  string  $scope  The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort  The property by which to sort the results.
     *                        `created` means when the alert was created.
     *                        `updated` means when the alert's state last changed.
     *                        `epss_percentage` sorts alerts by the Exploit Prediction Scoring System (EPSS) percentage.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $first  **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     *                      This parameter must not be used in combination with `last`.
     *                      Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last  **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     *                     This parameter must not be used in combination with `first`.
     *                     Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function listAlertsForOrg(
        string $org,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $epssPercentage,
        mixed $has,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForOrg($org, $state, $severity, $ecosystem, $package, $epssPercentage, $has, $scope, $sort, $direction, $before, $first, $last));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listOrgSecrets(string $org, ?int $page): Response
    {
        return $this->connector->send(new DependabotListOrgSecrets($org, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getOrgPublicKey(string $org): Response
    {
        return $this->connector->send(new DependabotGetOrgPublicKey($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function getOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotGetOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function createOrUpdateOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotCreateOrUpdateOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotDeleteOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listSelectedReposForOrgSecret(string $org, string $secretName, ?int $page): Response
    {
        return $this->connector->send(new DependabotListSelectedReposForOrgSecret($org, $secretName, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function setSelectedReposForOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotSetSelectedReposForOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function addSelectedRepoToOrgSecret(string $org, string $secretName, int $repositoryId): Response
    {
        return $this->connector->send(new DependabotAddSelectedRepoToOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function removeSelectedRepoFromOrgSecret(
        string $org,
        string $secretName,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new DependabotRemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $state  A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity  A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem  A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package  A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $manifest  A comma-separated list of full manifest paths. If specified, only alerts for these manifests will be returned.
     * @param  string  $epssPercentage  CVE Exploit Prediction Scoring System (EPSS) percentage. Can be specified as:
     *                                  - An exact number (`n`)
     *                                  - Comparators such as `>n`, `<n`, `>=n`, `<=n`
     *                                  - A range like `n..n`, where `n` is a number from 0.0 to 1.0
     *
     * Filters the list of alerts based on EPSS percentages. If specified, only alerts with the provided EPSS percentages will be returned.
     * @param  mixed  $has  Filters the list of alerts based on whether the alert has the given value. If specified, only alerts meeting this criterion will be returned.
     *                      Multiple `has` filters can be passed to filter for alerts that have all of the values. Currently, only `patch` is supported.
     * @param  string  $scope  The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort  The property by which to sort the results.
     *                        `created` means when the alert was created.
     *                        `updated` means when the alert's state last changed.
     *                        `epss_percentage` sorts alerts by the Exploit Prediction Scoring System (EPSS) percentage.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  **Closing down notice**. Page number of the results to fetch. Use cursor-based pagination with `before` or `after` instead.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $first  **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     *                      This parameter must not be used in combination with `last`.
     *                      Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last  **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     *                     This parameter must not be used in combination with `first`.
     *                     Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function listAlertsForRepo(
        string $owner,
        string $repo,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $manifest,
        ?string $epssPercentage,
        mixed $has,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForRepo($owner, $repo, $state, $severity, $ecosystem, $package, $manifest, $epssPercentage, $has, $scope, $sort, $direction, $page, $before, $first, $last));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies a Dependabot alert in its repository.
     *                            You can find this at the end of the URL for a Dependabot alert within GitHub,
     *                            or in `number` fields in the response from the
     *                            `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function getAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new DependabotGetAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies a Dependabot alert in its repository.
     *                            You can find this at the end of the URL for a Dependabot alert within GitHub,
     *                            or in `number` fields in the response from the
     *                            `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function updateAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new DependabotUpdateAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listRepoSecrets(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new DependabotListRepoSecrets($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getRepoPublicKey(string $owner, string $repo): Response
    {
        return $this->connector->send(new DependabotGetRepoPublicKey($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function getRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotGetRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function createOrUpdateRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotCreateOrUpdateRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $secretName  The name of the secret.
     */
    public function deleteRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotDeleteRepoSecret($owner, $repo, $secretName));
    }
}
