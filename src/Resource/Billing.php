<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubActionsBillingOrg;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubActionsBillingUser;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubBillingUsageReportOrg;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubBillingUsageReportUser;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubPackagesBillingOrg;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetGithubPackagesBillingUser;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetSharedStorageBillingOrg;
use Oneduo\GitHubSdk\Requests\Billing\BillingGetSharedStorageBillingUser;
use Saloon\Http\Response;

class Billing extends GitHubResource
{
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $year  If specified, only return results for a single year. The value of `year` is an integer with four digits representing a year. For example, `2025`. Default value is the current year.
     * @param  int  $month  If specified, only return results for a single month. The value of `month` is an integer between `1` and `12`. If no year is specified the default `year` is used.
     * @param  int  $day  If specified, only return results for a single day. The value of `day` is an integer between `1` and `31`. If no `year` or `month` is specified, the default `year` and `month` are used.
     * @param  int  $hour  If specified, only return results for a single hour. The value of `hour` is an integer between `0` and `23`. If no `year`, `month`, or `day` is specified, the default `year`, `month`, and `day` are used.
     */
    public function getGithubBillingUsageReportOrg(
        string $org,
        ?int $year,
        ?int $month,
        ?int $day,
        ?int $hour,
    ): Response {
        return $this->connector->send(new BillingGetGithubBillingUsageReportOrg($org, $year, $month, $day, $hour));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getGithubActionsBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetGithubActionsBillingOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getGithubPackagesBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetGithubPackagesBillingOrg($org));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function getSharedStorageBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetSharedStorageBillingOrg($org));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getGithubActionsBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetGithubActionsBillingUser($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getGithubPackagesBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetGithubPackagesBillingUser($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function getSharedStorageBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetSharedStorageBillingUser($username));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  int  $year  If specified, only return results for a single year. The value of `year` is an integer with four digits representing a year. For example, `2025`. Default value is the current year.
     * @param  int  $month  If specified, only return results for a single month. The value of `month` is an integer between `1` and `12`. If no year is specified the default `year` is used.
     * @param  int  $day  If specified, only return results for a single day. The value of `day` is an integer between `1` and `31`. If no `year` or `month` is specified, the default `year` and `month` are used.
     * @param  int  $hour  If specified, only return results for a single hour. The value of `hour` is an integer between `0` and `23`. If no `year`, `month`, or `day` is specified, the default `year`, `month`, and `day` are used.
     */
    public function getGithubBillingUsageReportUser(
        string $username,
        ?int $year,
        ?int $month,
        ?int $day,
        ?int $hour,
    ): Response {
        return $this->connector->send(new BillingGetGithubBillingUsageReportUser($username, $year, $month, $day, $hour));
    }
}
