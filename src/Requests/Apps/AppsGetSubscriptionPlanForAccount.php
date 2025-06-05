<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-subscription-plan-for-account
 *
 * Shows whether the user or organization account actively subscribes to a plan listed by the
 * authenticated GitHub App. When someone submits a plan change that won't be processed until the end
 * of their billing cycle, you will also see the upcoming pending change.
 *
 * GitHub Apps must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint. OAuth apps must use [basic
 * authentication](https://docs.github.com/rest/authentication/authenticating-to-the-rest-api#using-basic-authentication)
 * with their client ID and client secret to access this endpoint.
 */
class AppsGetSubscriptionPlanForAccount extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/marketplace_listing/accounts/{$this->accountId}";
    }

    /**
     * @param  int  $accountId  account_id parameter
     */
    public function __construct(
        protected int $accountId,
    ) {}
}
