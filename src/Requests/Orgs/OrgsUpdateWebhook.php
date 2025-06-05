<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-webhook
 *
 * Updates a webhook configured in an organization. When you update a webhook,
 * the `secret` will be
 * overwritten. If you previously had a `secret` set, you must
 * provide the same `secret` or set a new
 * `secret` or the secret will be removed. If
 * you are only updating individual webhook `config`
 * properties, use "[Update a webhook
 * configuration for an
 * organization](/rest/orgs/webhooks#update-a-webhook-configuration-for-an-organization)".
 *
 * You must be
 * an organization owner to use this endpoint.
 *
 * OAuth app tokens and personal access tokens (classic)
 * need `admin:org_hook` scope. OAuth apps cannot list, view, or edit
 * webhooks that they did not create
 * and users cannot list, view, or edit webhooks that were created by OAuth apps.
 */
class OrgsUpdateWebhook extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
