<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/delete-webhook
 *
 * Delete a webhook for an organization.
 *
 * The authenticated user must be an organization owner to use
 * this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need `admin:org_hook` scope.
 * OAuth apps cannot list, view, or edit
 * webhooks that they did not create and users cannot list, view,
 * or edit webhooks that were created by OAuth apps.
 */
class OrgsDeleteWebhook extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/hooks/{$this->hookId}";
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
