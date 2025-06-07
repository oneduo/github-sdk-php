<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-or-update-custom-properties
 *
 * Creates new or updates existing custom properties defined for an organization in a batch.
 *
 * If the
 * property already exists, the existing property will be replaced with the new values.
 * Missing
 * optional values will fall back to default values, previous values will be overwritten.
 * E.g. if a
 * property exists with `values_editable_by: org_and_repo_actors` and it's updated without specifying
 * `values_editable_by`, it will be updated to default value `org_actors`.
 *
 * To use this endpoint, the
 * authenticated user must be one of:
 *   - An administrator for the organization.
 *   - A user, or a user
 * on a team, with the fine-grained permission of `custom_properties_org_definitions_manager` in the
 * organization.
 */
class OrgsCreateOrUpdateCustomProperties extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/properties/schema";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
