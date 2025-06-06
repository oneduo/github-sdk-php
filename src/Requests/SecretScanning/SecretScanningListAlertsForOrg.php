<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\SecretScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * secret-scanning/list-alerts-for-org
 *
 * Lists secret scanning alerts for eligible repositories in an organization, from newest to
 * oldest.
 *
 * The authenticated user must be an administrator or security manager for the organization to
 * use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need the `repo` or
 * `security_events` scope to use this endpoint. If this endpoint is only used with public
 * repositories, the token can use the `public_repo` scope instead.
 */
class SecretScanningListAlertsForOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/secret-scanning/alerts";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|string  $state  Set to `open` or `resolved` to only list secret scanning alerts in a specific state.
     * @param  null|string  $secretType  A comma-separated list of secret types to return. All default secret patterns are returned. To return generic patterns, pass the token name(s) in the parameter. See "[Supported secret scanning patterns](https://docs.github.com/code-security/secret-scanning/introduction/supported-secret-scanning-patterns#supported-secrets)" for a complete list of secret types.
     * @param  null|string  $resolution  A comma-separated list of resolutions. Only secret scanning alerts with one of these resolutions are listed. Valid resolutions are `false_positive`, `wont_fix`, `revoked`, `pattern_edited`, `pattern_deleted` or `used_in_tests`.
     * @param  null|string  $sort  The property to sort the results by. `created` means when the alert was created. `updated` means when the alert was updated or resolved.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $perPage  The number of results per page. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for events before this cursor. To receive an initial cursor on your first request, include an empty "before" query string.
     * @param  null|string  $validity  A comma-separated list of validities that, when present, will return alerts that match the validities in this list. Valid options are `active`, `inactive`, and `unknown`.
     * @param  null|bool  $isPubliclyLeaked  A boolean value representing whether or not to filter alerts by the publicly-leaked tag being present.
     * @param  null|bool  $isMultiRepo  A boolean value representing whether or not to filter alerts by the multi-repo tag being present.
     * @param  null|bool  $hideSecret  A boolean value representing whether or not to hide literal secrets in the results.
     */
    public function __construct(
        protected string $org,
        protected ?string $state = null,
        protected ?string $secretType = null,
        protected ?string $resolution = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
        protected ?int $perPage = null,
        protected ?string $before = null,
        protected ?string $validity = null,
        protected ?bool $isPubliclyLeaked = null,
        protected ?bool $isMultiRepo = null,
        protected ?bool $hideSecret = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter([
            'state' => $this->state,
            'secret_type' => $this->secretType,
            'resolution' => $this->resolution,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'before' => $this->before,
            'validity' => $this->validity,
            'is_publicly_leaked' => $this->isPubliclyLeaked,
            'is_multi_repo' => $this->isMultiRepo,
            'hide_secret' => $this->hideSecret,
        ]);
    }
}
