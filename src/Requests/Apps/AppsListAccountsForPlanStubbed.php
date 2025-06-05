<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-accounts-for-plan-stubbed
 *
 * Returns repository and organization accounts associated with the specified plan, including free
 * plans. For per-seat pricing, you see the list of accounts that have purchased the plan, including
 * the number of seats purchased. When someone submits a plan change that won't be processed until the
 * end of their billing cycle, you will also see the upcoming pending change.
 *
 * GitHub Apps must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint. OAuth apps must use [basic
 * authentication](https://docs.github.com/rest/authentication/authenticating-to-the-rest-api#using-basic-authentication)
 * with their client ID and client secret to access this endpoint.
 */
class AppsListAccountsForPlanStubbed extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/marketplace_listing/stubbed/plans/{$this->planId}/accounts";
    }

    /**
     * @param  int  $planId  The unique identifier of the plan.
     * @param  null|string  $sort  The property to sort the results by.
     * @param  null|string  $direction  To return the oldest accounts first, set to `asc`. Ignored without the `sort` parameter.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected int $planId,
        protected ?string $sort = null,
        protected ?string $direction = null,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page]);
    }
}
