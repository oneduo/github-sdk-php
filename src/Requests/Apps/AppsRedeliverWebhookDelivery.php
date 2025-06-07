<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/redeliver-webhook-delivery
 *
 * Redeliver a delivery for the webhook configured for a GitHub App.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsRedeliverWebhookDelivery extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/app/hook/deliveries/{$this->deliveryId}/attempts";
    }

    public function __construct(
        protected int $deliveryId,
    ) {}
}
