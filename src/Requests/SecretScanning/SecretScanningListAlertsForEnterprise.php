<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/list-alerts-for-enterprise
 *
 * Lists secret scanning alerts for eligible repositories in an enterprise, from newest to
 * oldest.
 *
 * Alerts are only returned for organizations in the enterprise for which the authenticated
 * user is an organization owner or a [security
 * manager](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization).
 *
 * The
 * authenticated user must be a member of the enterprise in order to use this endpoint.
 *
 * OAuth app
 * tokens and personal access tokens (classic) need the `repo` scope or `security_events` scope to use
 * this endpoint.
 */
class SecretScanningListAlertsForEnterprise extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/secret-scanning/alerts";
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  null|string  $state  Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  null|string  $secretType  A comma-separated list of secret types to return. All default secret patterns are returned. To return generic patterns, pass the token name(s) in the parameter. See "[Supported secret scanning patterns](https://docs.github.com/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)" for a complete list of secret types.
     * @param  null|string  $resolution  A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  null|string  $sort  The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $validity  A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     * @param  null|bool  $isPubliclyLeaked  A boolean value representing whether or not to filter alerts by the publicly-leaked tag being present.
     * @param  null|bool  $isMultiRepo  A boolean value representing whether or not to filter alerts by the multi-repo tag being present.
     * @param  null|bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function __construct(
        protected string $enterprise,
        protected ?string $state = null,
        protected ?string $secretType = null,
        protected ?string $resolution = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $before = null,
        protected ?string $validity = null,
        protected ?bool $isPubliclyLeaked = null,
        protected ?bool $isMultiRepo = null,
        protected ?bool $hideSecret = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'state' => $this->state,
            'secret_type' => $this->secretType,
            'resolution' => $this->resolution,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'before' => $this->before,
            'validity' => $this->validity,
            'is_publicly_leaked' => $this->isPubliclyLeaked,
            'is_multi_repo' => $this->isMultiRepo,
            'hide_secret' => $this->hideSecret,
        ]);
    }
}
