<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-github-billing-usage-report-org
 *
 * Gets a report of the total usage for an organization. To use this endpoint, you must be an
 * administrator of an organization within an enterprise or an organization account.
 *
 * **Note:** This
 * endpoint is only available to organizations with access to the enhanced billing platform. For more
 * information, see "[About the enhanced billing
 * platform](https://docs.github.com/billing/using-the-new-billing-platform)."
 */
class BillingGetGithubBillingUsageReportOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/organizations/{$this->org}/settings/billing/usage";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $year  If specified, only return results for a single year. The value of `year` is an integer with four digits representing a year. For example, `2025`. Default value is the current year.
     * @param  null|int  $month  If specified, only return results for a single month. The value of `month` is an integer between `1` and `12`. If no year is specified the default `year` is used.
     * @param  null|int  $day  If specified, only return results for a single day. The value of `day` is an integer between `1` and `31`. If no `year` or `month` is specified, the default `year` and `month` are used.
     * @param  null|int  $hour  If specified, only return results for a single hour. The value of `hour` is an integer between `0` and `23`. If no `year`, `month`, or `day` is specified, the default `year`, `month`, and `day` are used.
     */
    public function __construct(
        protected string $org,
        protected ?int $year = null,
        protected ?int $month = null,
        protected ?int $day = null,
        protected ?int $hour = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['year' => $this->year, 'month' => $this->month, 'day' => $this->day, 'hour' => $this->hour]);
    }
}
