<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-github-actions-billing-org
 *
 * Gets the summary of the free and paid GitHub Actions minutes used.
 *
 * Paid minutes only apply to
 * workflows in private repositories that use GitHub-hosted runners. Minutes used is listed for each
 * GitHub-hosted runner operating system. Any job re-runs are also included in the usage. The usage
 * returned includes any minute multipliers for macOS and Windows runners, and is rounded up to the
 * nearest whole minute. For more information, see "[Managing billing for GitHub
 * Actions](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-actions)".
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` or `admin:org` scope to use this
 * endpoint.
 */
class BillingGetGithubActionsBillingOrg extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/settings/billing/actions";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
