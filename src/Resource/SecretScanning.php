<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningCreatePushProtectionBypass;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningGetAlert;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningGetScanHistory;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningListAlertsForEnterprise;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningListAlertsForOrg;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningListAlertsForRepo;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningListLocationsForAlert;
use Oneduo\GitHubSdk\Requests\SecretScanning\SecretScanningUpdateAlert;
use Saloon\Http\Response;

class SecretScanning extends GitHubResource
{
    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  string  $state  Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType  A comma-separated list of secret types to return. All default secret patterns are returned. To return generic patterns, pass the token name(s) in the parameter. See "[Supported secret scanning patterns](https://docs.github.com/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)" for a complete list of secret types.
     * @param  string  $resolution  A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort  The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $validity  A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     * @param  bool  $isPubliclyLeaked  A boolean value representing whether or not to filter alerts by the publicly-leaked tag being present.
     * @param  bool  $isMultiRepo  A boolean value representing whether or not to filter alerts by the multi-repo tag being present.
     * @param  bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function listAlertsForEnterprise(
        string $enterprise,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?string $validity,
        ?bool $isPubliclyLeaked,
        ?bool $isMultiRepo,
        ?bool $hideSecret,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForEnterprise($enterprise, $state, $secretType, $resolution, $sort, $direction, $before, $validity, $isPubliclyLeaked, $isMultiRepo, $hideSecret));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $state  Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType  A comma-separated list of secret types to return. All default secret patterns are returned. To return generic patterns, pass the token name(s) in the parameter. See "[Supported secret scanning patterns](https://docs.github.com/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)" for a complete list of secret types.
     * @param  string  $resolution  A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort  The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for events before this cursor. To receive an initial cursor on your first request, include an empty "before" query string.
     * @param  string  $validity  A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     * @param  bool  $isPubliclyLeaked  A boolean value representing whether or not to filter alerts by the publicly-leaked tag being present.
     * @param  bool  $isMultiRepo  A boolean value representing whether or not to filter alerts by the multi-repo tag being present.
     * @param  bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function listAlertsForOrg(
        string $org,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?string $validity,
        ?bool $isPubliclyLeaked,
        ?bool $isMultiRepo,
        ?bool $hideSecret,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForOrg($org, $state, $secretType, $resolution, $sort, $direction, $page, $before, $validity, $isPubliclyLeaked, $isMultiRepo, $hideSecret));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $state  Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  string  $secretType  A comma-separated list of secret types to return. All default secret patterns are returned. To return generic patterns, pass the token name(s) in the parameter. See "[Supported secret scanning patterns](https://docs.github.com/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)" for a complete list of secret types.
     * @param  string  $resolution  A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  string  $sort  The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  string  $direction  The direction to sort the results by.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for events before this cursor. To receive an initial cursor on your first request, include an empty "before" query string.
     * @param  string  $validity  A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     * @param  bool  $isPubliclyLeaked  A boolean value representing whether or not to filter alerts by the publicly-leaked tag being present.
     * @param  bool  $isMultiRepo  A boolean value representing whether or not to filter alerts by the multi-repo tag being present.
     * @param  bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function listAlertsForRepo(
        string $owner,
        string $repo,
        ?string $state,
        ?string $secretType,
        ?string $resolution,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?string $validity,
        ?bool $isPubliclyLeaked,
        ?bool $isMultiRepo,
        ?bool $hideSecret,
    ): Response {
        return $this->connector->send(new SecretScanningListAlertsForRepo($owner, $repo, $state, $secretType, $resolution, $sort, $direction, $page, $before, $validity, $isPubliclyLeaked, $isMultiRepo, $hideSecret));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function getAlert(string $owner, string $repo, int $alertNumber, ?bool $hideSecret): Response
    {
        return $this->connector->send(new SecretScanningGetAlert($owner, $repo, $alertNumber, $hideSecret));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     */
    public function updateAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new SecretScanningUpdateAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $alertNumber  The number that identifies an alert. You can find this at the end of the URL for a code scanning alert within GitHub, and in the `number` field in the response from the `GET /repos/{owner}/{repo}/code-scanning/alerts` operation.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listLocationsForAlert(
        string $owner,
        string $repo,
        int $alertNumber,
        ?int $page,
    ): Response {
        return $this->connector->send(new SecretScanningListLocationsForAlert($owner, $repo, $alertNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function createPushProtectionBypass(string $owner, string $repo): Response
    {
        return $this->connector->send(new SecretScanningCreatePushProtectionBypass($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function getScanHistory(string $owner, string $repo): Response
    {
        return $this->connector->send(new SecretScanningGetScanHistory($owner, $repo));
    }
}
