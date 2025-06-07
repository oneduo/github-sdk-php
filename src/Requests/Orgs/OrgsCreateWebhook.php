<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-webhook
 *
 * Create a hook that posts payloads in JSON format.
 *
 * You must be an organization owner to use this
 * endpoint.
 *
 * OAuth app tokens and personal access tokens (classic) need `admin:org_hook` scope. OAuth
 * apps cannot list, view, or
 * edit webhooks that they did not create and users cannot list, view, or
 * edit webhooks that were created by OAuth apps.
 */
class OrgsCreateWebhook extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/hooks";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
