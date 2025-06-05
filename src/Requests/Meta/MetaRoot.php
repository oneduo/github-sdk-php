<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Meta;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * meta/root
 *
 * Get Hypermedia links to resources accessible in GitHub's REST API
 */
class MetaRoot extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/';
    }

    public function __construct() {}
}
