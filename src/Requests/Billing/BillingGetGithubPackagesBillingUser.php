<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-github-packages-billing-user
 *
 * Gets the free and paid storage used for GitHub Packages in gigabytes.
 *
 * Paid minutes only apply to
 * packages stored for private repositories. For more information, see "[Managing billing for GitHub
 * Packages](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-packages)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `user` scope to use this endpoint.
 */
class BillingGetGithubPackagesBillingUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/settings/billing/packages";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
