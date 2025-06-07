<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/remove-custom-property
 *
 * Removes a custom property that is defined for an organization.
 *
 * To use this endpoint, the
 * authenticated user must be one of:
 *   - An administrator for the organization.
 *   - A user, or a user
 * on a team, with the fine-grained permission of `custom_properties_org_definitions_manager` in the
 * organization.
 */
class OrgsRemoveCustomProperty extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/properties/schema/{$this->customPropertyName}";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $customPropertyName  The custom property name
     */
    public function __construct(
        protected string $org,
        protected string $customPropertyName,
    ) {}
}
