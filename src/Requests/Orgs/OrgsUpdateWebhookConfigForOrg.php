<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-webhook-config-for-org
 *
 * Updates the webhook configuration for an organization. To update more information about the webhook,
 * including the `active` state and `events`, use "[Update an organization webhook
 * ](/rest/orgs/webhooks#update-an-organization-webhook)."
 *
 * You must be an organization owner to use
 * this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need `admin:org_hook` scope.
 * OAuth apps cannot list, view, or edit
 * webhooks that they did not create and users cannot list, view,
 * or edit webhooks that were created by OAuth apps.
 */
class OrgsUpdateWebhookConfigForOrg extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/hooks/{$this->hookId}/config";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  int  $hookId  The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $org,
        protected int $hookId,
    ) {}
}
