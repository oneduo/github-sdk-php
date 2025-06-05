<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningCommitAutofix;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningCreateAutofix;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningCreateVariantAnalysis;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningDeleteAnalysis;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningDeleteCodeqlDatabase;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetAlert;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetAnalysis;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetAutofix;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetCodeqlDatabase;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetDefaultSetup;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetSarif;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetVariantAnalysis;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningGetVariantAnalysisRepoTask;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningListAlertInstances;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningListAlertsForOrg;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningListAlertsForRepo;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningListCodeqlDatabases;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningListRecentAnalyses;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningUpdateAlert;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningUpdateDefaultSetup;
use Oneduo\GitHubSdk\Requests\CodeScanning\CodeScanningUploadSarif;
use Saloon\Http\Response;

class CodeScanning extends GitHubResource {
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $toolName  The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  string  $toolGuid  The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $state  If specified, only code scanning alerts with this state will be returned.
     * @param  string  $sort  The property by which to sort the results.
     * @param  string  $severity  If specified, only code scanning alerts with this severity will be returned.
     */
    public function listAlertsForOrg(
        string $org,
        ?string $toolName,
        ?string $toolGuid,
        ?string $before,
        ?int $page,
        ?string $direction,
        ?string $state,
        ?string $sort,
        ?string $severity,
    ): Response {
        return $this->connector->send(new CodeScanningListAlertsForOrg($org, $toolName, $toolGuid, $before, $page, $direction, $state, $sort, $severity));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $toolName  The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  string  $toolGuid  The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  int  $pr  The number of the pull request for the results you want to list.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $sort  The property by which to sort the results.
     * @param  string  $state  If specified, only code scanning alerts with this state will be returned.
     * @param  string  $severity  If specified, only code scanning alerts with this severity will be returned.
     */
    public function listAlertsForRepo(
        string $owner,
        string $repo,
        ?string $toolName,
        ?string $toolGuid,
        ?int $page,
        ?string $ref,
        ?int $pr,
        ?string $direction,
        ?string $before,
        ?string $sort,
        ?string $state,
        ?string $severity,
    ): Response {
        return $this->connector->send(new CodeScanningListAlertsForRepo($owner, $repo, $toolName, $toolGuid, $page, $ref, $pr, $direction, $before, $sort, $state, $severity));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function getAlert(string $owner, string $repo, int $alertNumber): Response {
        return $this->connector->send(new CodeScanningGetAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function updateAlert(string $owner, string $repo, int $alertNumber): Response {
        return $this->connector->send(new CodeScanningUpdateAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function getAutofix(string $owner, string $repo, int $alertNumber): Response {
        return $this->connector->send(new CodeScanningGetAutofix($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function createAutofix(string $owner, string $repo, int $alertNumber): Response {
        return $this->connector->send(new CodeScanningCreateAutofix($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function commitAutofix(string $owner, string $repo, int $alertNumber): Response {
        return $this->connector->send(new CodeScanningCommitAutofix($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $ref  The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  int  $pr  The number of the pull request for the results you want to list.
     */
    public function listAlertInstances(
        string $owner,
        string $repo,
        int $alertNumber,
        ?int $page,
        ?string $ref,
        ?int $pr,
    ): Response {
        return $this->connector->send(new CodeScanningListAlertInstances($owner, $repo, $alertNumber, $page, $ref, $pr));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $toolName  The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
     * @param  string  $toolGuid  The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  int  $pr  The number of the pull request for the results you want to list.
     * @param  string  $ref  The Git reference for the analyses you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
     * @param  string  $sarifId  Filter analyses belonging to the same SARIF upload.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $sort  The property by which to sort the results.
     */
    public function listRecentAnalyses(
        string $owner,
        string $repo,
        ?string $toolName,
        ?string $toolGuid,
        ?int $page,
        ?int $pr,
        ?string $ref,
        ?string $sarifId,
        ?string $direction,
        ?string $sort,
    ): Response {
        return $this->connector->send(new CodeScanningListRecentAnalyses($owner, $repo, $toolName, $toolGuid, $page, $pr, $ref, $sarifId, $direction, $sort));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $analysisId  The ID of the analysis, as returned from the `GET /repos/{owner}/{repo}/code-scanning/analyses` operation.
     */
    public function getAnalysis(string $owner, string $repo, int $analysisId): Response {
        return $this->connector->send(new CodeScanningGetAnalysis($owner, $repo, $analysisId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $analysisId  The ID of the analysis, as returned from the `GET /repos/{owner}/{repo}/code-scanning/analyses` operation.
     * @param  string  $confirmDelete  Allow deletion if the specified analysis is the last in a set. If you attempt to delete the final analysis in a set without setting this parameter to `true`, you'll get a 400 response with the message: `Analysis is last of its type and deletion may result in the loss of historical alert data. Please specify confirm_delete.`
     */
    public function deleteAnalysis(
        string $owner,
        string $repo,
        int $analysisId,
        ?string $confirmDelete,
    ): Response {
        return $this->connector->send(new CodeScanningDeleteAnalysis($owner, $repo, $analysisId, $confirmDelete));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function listCodeqlDatabases(string $owner, string $repo): Response {
        return $this->connector->send(new CodeScanningListCodeqlDatabases($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $language  The language of the CodeQL database.
     */
    public function getCodeqlDatabase(string $owner, string $repo, string $language): Response {
        return $this->connector->send(new CodeScanningGetCodeqlDatabase($owner, $repo, $language));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $language  The language of the CodeQL database.
     */
    public function deleteCodeqlDatabase(string $owner, string $repo, string $language): Response {
        return $this->connector->send(new CodeScanningDeleteCodeqlDatabase($owner, $repo, $language));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createVariantAnalysis(string $owner, string $repo): Response {
        return $this->connector->send(new CodeScanningCreateVariantAnalysis($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $codeqlVariantAnalysisId  The unique identifier of the variant analysis.
     */
    public function getVariantAnalysis(string $owner, string $repo, int $codeqlVariantAnalysisId): Response {
        return $this->connector->send(new CodeScanningGetVariantAnalysis($owner, $repo, $codeqlVariantAnalysisId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the controller repository.
     * @param  int  $codeqlVariantAnalysisId  The ID of the variant analysis.
     * @param  string  $repoOwner  The account owner of the variant analysis repository. The name is not case sensitive.
     * @param  string  $repoName  The name of the variant analysis repository.
     */
    public function getVariantAnalysisRepoTask(
        string $owner,
        string $repo,
        int $codeqlVariantAnalysisId,
        string $repoOwner,
        string $repoName,
    ): Response {
        return $this->connector->send(new CodeScanningGetVariantAnalysisRepoTask($owner, $repo, $codeqlVariantAnalysisId, $repoOwner, $repoName));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getDefaultSetup(string $owner, string $repo): Response {
        return $this->connector->send(new CodeScanningGetDefaultSetup($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function updateDefaultSetup(string $owner, string $repo): Response {
        return $this->connector->send(new CodeScanningUpdateDefaultSetup($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function uploadSarif(string $owner, string $repo): Response {
        return $this->connector->send(new CodeScanningUploadSarif($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $sarifId  The SARIF ID obtained after uploading.
     */
    public function getSarif(string $owner, string $repo, string $sarifId): Response {
        return $this->connector->send(new CodeScanningGetSarif($owner, $repo, $sarifId));
    }
}
