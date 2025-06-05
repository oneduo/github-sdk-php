<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * copilot/add-copilot-seats-for-users
 *
 * > [!NOTE]
 * > This endpoint is in public preview and is subject to change.
 *
 * Purchases a GitHub Copilot
 * seat for each user specified.
 * The organization will be billed for each seat based on the
 * organization's Copilot plan. For more information about Copilot pricing, see "[About billing for
 * GitHub Copilot in your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/managing-the-copilot-subscription-for-your-organization/about-billing-for-github-copilot-in-your-organization)."
 *
 * Only
 * organization owners can purchase Copilot seats for their organization members. The organization must
 * have a Copilot Business or Copilot Enterprise subscription and a configured suggestion matching
 * policy.
 * For more information about setting up a Copilot subscription, see "[Subscribing to Copilot
 * for your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/managing-the-copilot-subscription-for-your-organization/subscribing-to-copilot-for-your-organization)."
 * For
 * more information about setting a suggestion matching policy, see "[Managing policies for Copilot in
 * your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/setting-policies-for-copilot-in-your-organization/managing-policies-for-copilot-in-your-organization#policies-for-suggestion-matching)."
 *
 * The
 * response contains the total number of new seats that were created and existing seats that were
 * refreshed.
 *
 * OAuth app tokens and personal access tokens (classic) need either the
 * `manage_billing:copilot` or `admin:org` scopes to use this endpoint.
 */
class CopilotAddCopilotSeatsForUsers extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/copilot/billing/selected_users";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
