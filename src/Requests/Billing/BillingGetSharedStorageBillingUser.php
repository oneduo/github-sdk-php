<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-shared-storage-billing-user
 *
 * Gets the estimated paid and estimated total storage used for GitHub Actions and GitHub
 * Packages.
 *
 * Paid minutes only apply to packages stored for private repositories. For more
 * information, see "[Managing billing for GitHub
 * Packages](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-packages)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `user` scope to use this endpoint.
 */
class BillingGetSharedStorageBillingUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/users/{$this->username}/settings/billing/shared-storage";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
