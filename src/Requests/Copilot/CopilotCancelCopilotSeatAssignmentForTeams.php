<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/cancel-copilot-seat-assignment-for-teams
 *
 * > [!NOTE]
 * > This endpoint is in public preview and is subject to change.
 *
 * Sets seats for all members
 * of each team specified to "pending cancellation".
 * This will cause the members of the specified
 * team(s) to lose access to GitHub Copilot at the end of the current billing cycle unless they retain
 * access through another team.
 * For more information about disabling access to Copilot, see "[Revoking
 * access to Copilot for members of your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/managing-access-to-github-copilot-in-your-organization/revoking-access-to-copilot-for-members-of-your-organization)."
 *
 * Only
 * organization owners can cancel Copilot seats for their organization members.
 *
 * The response contains
 * the total number of seats set to "pending cancellation".
 *
 * OAuth app tokens and personal access
 * tokens (classic) need either the `manage_billing:copilot` or `admin:org` scopes to use this
 * endpoint.
 */
class CopilotCancelCopilotSeatAssignmentForTeams extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/copilot/billing/selected_teams";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
