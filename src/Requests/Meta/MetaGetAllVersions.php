<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * meta/get-all-versions
 *
 * Get all supported GitHub API versions.
 */
class MetaGetAllVersions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/versions';
    }

    public function __construct() {}
}
