<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-webhook-deliveries
 *
 * Returns a list of webhook deliveries for a webhook configured in an organization.
 *
 * You must be an
 * organization owner to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need
 * `admin:org_hook` scope. OAuth apps cannot list, view, or edit
 * webhooks that they did not create and
 * users cannot list, view, or edit webhooks that were created by OAuth apps.
 */
class OrgsListWebhookDeliveries extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/hooks/{$this->hookId}/deliveries";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     * @param  null|string  $cursor  Used for pagination: the starting delivery from which the page of deliveries is fetched. Refer to the `link` header for the next and previous page cursors.
     */
    public function __construct(
        protected string $org,
        protected int $hookId,
        protected ?string $cursor = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['cursor' => $this->cursor]);
    }
}
