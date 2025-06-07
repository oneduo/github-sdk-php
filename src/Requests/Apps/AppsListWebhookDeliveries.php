<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-webhook-deliveries
 *
 * Returns a list of webhook deliveries for the webhook configured for a GitHub App.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsListWebhookDeliveries extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/app/hook/deliveries';
    }

    /**
     * @param  null|string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function __construct(
        protected ?string $cursor = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['cursor' => $this->cursor]);
    }
}
