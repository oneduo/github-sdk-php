<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-or-update-custom-properties-values
 *
 * Create new or update existing custom property values for a repository.
 * Using a value of `null` for a
 * custom property will remove or 'unset' the property value from the repository.
 *
 * Repository admins
 * and other users with the repository-level "edit custom property values" fine-grained permission can
 * use this endpoint.
 */
class ReposCreateOrUpdateCustomPropertiesValues extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/properties/values";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
