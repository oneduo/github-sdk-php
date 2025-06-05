<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Markdown;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * markdown/render
 */
class MarkdownRender extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/markdown';
    }

    public function __construct() {}
}
