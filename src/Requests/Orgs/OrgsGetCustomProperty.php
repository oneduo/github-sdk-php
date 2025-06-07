<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-custom-property
 *
 * Gets a custom property that is defined for an organization.
 * Organization members can read these
 * properties.
 */
class OrgsGetCustomProperty extends Request
{
    protected Method $method = Method::GET;

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
