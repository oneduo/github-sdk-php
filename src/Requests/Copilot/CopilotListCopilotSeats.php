<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/list-copilot-seats
 *
 * > [!NOTE]
 * > This endpoint is in public preview and is subject to change.
 *
 * Lists all Copilot seats
 * for which an organization with a Copilot Business or Copilot Enterprise subscription is currently
 * being billed.
 * Only organization owners can view assigned seats.
 *
 * Each seat object contains
 * information about the assigned user's most recent Copilot activity. Users must have telemetry
 * enabled in their IDE for Copilot in the IDE activity to be reflected in `last_activity_at`.
 * For more
 * information about activity data, see "[Reviewing user activity data for Copilot in your
 * organization](https://docs.github.com/copilot/managing-copilot/managing-github-copilot-in-your-organization/reviewing-activity-related-to-github-copilot-in-your-organization/reviewing-user-activity-data-for-copilot-in-your-organization)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need either the `manage_billing:copilot` or
 * `read:org` scopes to use this endpoint.
 */
class CopilotListCopilotSeats extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/orgs/{$this->org}/copilot/billing/seats";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  null|int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {}

    public function defaultQuery(): array {
        return array_filter(['page' => $this->page]);
    }
}
