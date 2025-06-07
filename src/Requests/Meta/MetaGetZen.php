<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * meta/get-zen
 *
 * Get a random sentence from the Zen of GitHub
 */
class MetaGetZen extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/zen';
    }

    public function __construct() {}
}
