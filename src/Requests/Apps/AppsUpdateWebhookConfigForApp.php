<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * apps/update-webhook-config-for-app
 *
 * Updates the webhook configuration for a GitHub App. For more information about configuring a webhook
 * for your app, see "[Creating a GitHub App](/developers/apps/creating-a-github-app)."
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsUpdateWebhookConfigForApp extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return '/app/hook/config';
    }

    public function __construct() {}
}
