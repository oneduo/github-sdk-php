<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-github-billing-usage-report-user
 *
 * Gets a report of the total usage for a user.
 *
 * **Note:** This endpoint is only available to users
 * with access to the enhanced billing platform.
 */
class BillingGetGithubBillingUsageReportUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/users/{$this->username}/settings/billing/usage";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  null|int  $year  If specified, only return results for a single year. The value of `year` is an integer with four digits representing a year. For example, `2025`. Default value is the current year.
     * @param  null|int  $month  If specified, only return results for a single month. The value of `month` is an integer between `1` and `12`. If no year is specified the default `year` is used.
     * @param  null|int  $day  If specified, only return results for a single day. The value of `day` is an integer between `1` and `31`. If no `year` or `month` is specified, the default `year` and `month` are used.
     * @param  null|int  $hour  If specified, only return results for a single hour. The value of `hour` is an integer between `0` and `23`. If no `year`, `month`, or `day` is specified, the default `year`, `month`, and `day` are used.
     */
    public function __construct(
        protected string $username,
        protected ?int $year = null,
        protected ?int $month = null,
        protected ?int $day = null,
        protected ?int $hour = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['year' => $this->year, 'month' => $this->month, 'day' => $this->day, 'hour' => $this->hour]);
    }
}
