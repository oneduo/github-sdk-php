<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/create-or-update-custom-properties-values-for-repos
 *
 * Create new or update existing custom property values for repositories in a batch that belong to an
 * organization.
 * Each target repository will have its custom property values updated to match the
 * values provided in the request.
 *
 * A maximum of 30 repositories can be updated in a single
 * request.
 *
 * Using a value of `null` for a custom property will remove or 'unset' the property value
 * from the repository.
 *
 * To use this endpoint, the authenticated user must be one of:
 *   - An
 * administrator for the organization.
 *   - A user, or a user on a team, with the fine-grained
 * permission of `custom_properties_org_values_editor` in the organization.
 */
class OrgsCreateOrUpdateCustomPropertiesValuesForRepos extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/properties/values";
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     */
    public function __construct(
        protected string $org,
    ) {}
}
