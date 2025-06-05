<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/get-copilot-seat-details-for-user
 *
 * > [!NOTE]
 * > This endpoint is in public preview and is subject to change.
 *
 * Gets the GitHub Copilot
 * seat details for a member of an organization who currently has access to GitHub Copilot.
 *
 * The seat
 * object contains information about the user's most recent Copilot activity. Users must have telemetry
 * enabled in their IDE for Copilot in the IDE activity to be reflected in `last_activity_at`.
 * For more
 * information about activity data, see "[Reviewing user activity data for Copilot in your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/reviewing-activity-related-to-github-copilot-in-your-organization/reviewing-user-activity-data-for-copilot-in-your-organization)."
 *
 * Only
 * organization owners can view Copilot seat assignment details for members of their
 * organization.
 *
 * OAuth app tokens and personal access tokens (classic) need either the
 * `manage_billing:copilot` or `read:org` scopes to use this endpoint.
 */
class CopilotGetCopilotSeatDetailsForUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/members/{$this->username}/copilot";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $org,
        protected string $username,
    ) {}
}
