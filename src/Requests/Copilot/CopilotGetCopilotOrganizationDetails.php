<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/get-copilot-organization-details
 *
 * > [!NOTE]
 * > This endpoint is in public preview and is subject to change.
 *
 * Gets information about an
 * organization's Copilot subscription, including seat breakdown
 * and feature policies. To configure
 * these settings, go to your organization's settings on GitHub.com.
 * For more information, see
 * "[Managing policies for Copilot in your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-policies-for-copilot-business-in-your-organization)."
 *
 * Only
 * organization owners can view details about the organization's Copilot Business or Copilot Enterprise
 * subscription.
 *
 * OAuth app tokens and personal access tokens (classic) need either the
 * `manage_billing:copilot` or `read:org` scopes to use this endpoint.
 */
class CopilotGetCopilotOrganizationDetails extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/copilot/billing";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
