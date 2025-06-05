<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-by-slug
 *
 * > [!NOTE]
 * > The `:app_slug` is just the URL-friendly name of your GitHub App. You can find this on
 * the settings page for your GitHub App (e.g., `https://github.com/settings/apps/:app_slug`).
 */
class AppsGetBySlug extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/apps/{$this->appSlug}";
    }

    public function __construct(
        protected string $appSlug,
    ) {}
}
