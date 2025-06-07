<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/list-alerts-for-enterprise
 *
 * Lists Dependabot alerts for repositories that are owned by the specified enterprise.
 *
 * The
 * authenticated user must be a member of the enterprise to use this endpoint.
 *
 * Alerts are only
 * returned for organizations in the enterprise for which you are an organization owner or a security
 * manager. For more information about security managers, see "[Managing security managers in your
 * organization](https://docs.github.com/organizations/managing-peoples-access-to-your-organization-with-roles/managing-security-managers-in-your-organization)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` or `security_events` scope to use
 * this endpoint.
 */
class DependabotListAlertsForEnterprise extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/enterprises/{$this->enterprise}/dependabot/alerts";
    }

    /**
     * @param  string  $enterprise  The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  null|string  $state  A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  null|string  $severity  A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  null|string  $ecosystem  A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  null|string  $package  A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  null|string  $epssPercentage  CVE Exploit Prediction Scoring System (EPSS) percentage. Can be specified as:
     *                                       - An exact number (`n`)
     *                                       - Comparators such as `>n`, `<n`, `>=n`, `<=n`
     *                                       - A range like `n..n`, where `n` is a number from 0.0 to 1.0
     *
     * Filters the list of alerts based on EPSS percentages. If specified, only alerts with the provided EPSS percentages will be returned.
     * @param  null|mixed  $has  Filters the list of alerts based on whether the alert has the given value. If specified, only alerts meeting this criterion will be returned.
     *                           Multiple `has` filters can be passed to filter for alerts that have all of the values. Currently, only `patch` is supported.
     * @param  null|string  $scope  The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  null|string  $sort  The property by which to sort the results.
     *                             `created` means when the alert was created.
     *                             `updated` means when the alert's state last changed.
     *                             `epss_percentage` sorts alerts by the Exploit Prediction Scoring System (EPSS) percentage.
     * @param  null|string  $direction  The direction to sort the results by.
     * @param  null|string  $before  A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     * @param  null|int  $first  **Deprecated**. The number of results per page , starting from the first matching result.
     *                           This parameter must not be used in combination with `last`.
     *                           Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  null|int  $last  **Deprecated**. The number of results per page , starting from the last matching result.
     *                          This parameter must not be used in combination with `first`.
     *                          Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function __construct(
        protected string $enterprise,
        protected ?string $state = null,
        protected ?string $severity = null,
        protected ?string $ecosystem = null,
        protected ?string $package = null,
        protected ?string $epssPercentage = null,
        protected mixed $has = null,
        protected ?string $scope = null,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?string $before = null,
        protected ?int $first = null,
        protected ?int $last = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'state' => $this->state,
            'severity' => $this->severity,
            'ecosystem' => $this->ecosystem,
            'package' => $this->package,
            'epss_percentage' => $this->epssPercentage,
            'has' => $this->has,
            'scope' => $this->scope,
            'sort' => $this->sort,
            'direction' => $this->direction,
            'before' => $this->before,
            'first' => $this->first,
            'last' => $this->last,
        ]);
    }
}
