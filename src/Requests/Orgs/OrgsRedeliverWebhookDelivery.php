<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/redeliver-webhook-delivery
 *
 * Redeliver a delivery for a webhook configured in an organization.
 *
 * You must be an organization owner
 * to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need `admin:org_hook`
 * scope. OAuth apps cannot list, view, or edit
 * webhooks that they did not create and users cannot
 * list, view, or edit webhooks that were created by OAuth apps.
 */
class OrgsRedeliverWebhookDelivery extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/hooks/{$this->hookId}/deliveries/{$this->deliveryId}/attempts";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $org,
        protected int $hookId,
        protected int $deliveryId,
    ) {}
}
