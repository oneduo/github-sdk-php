<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-shared-storage-billing-org
 *
 * Gets the estimated paid and estimated total storage used for GitHub Actions and GitHub
 * Packages.
 *
 * Paid minutes only apply to packages stored for private repositories. For more
 * information, see "[Managing billing for GitHub
 * Packages](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-packages)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` or `admin:org` scope to use this
 * endpoint.
 */
class BillingGetSharedStorageBillingOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/settings/billing/shared-storage";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
