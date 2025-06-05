<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-webhook-config-for-app
 *
 * Returns the webhook configuration for a GitHub App. For more information about configuring a webhook
 * for your app, see "[Creating a GitHub App](/developers/apps/creating-a-github-app)."
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsGetWebhookConfigForApp extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/app/hook/config';
    }

    public function __construct() {}
}
