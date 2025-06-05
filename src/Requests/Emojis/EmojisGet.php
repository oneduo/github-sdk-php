<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Emojis;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * emojis/get
 *
 * Lists all the emojis available to use on GitHub.
 */
class EmojisGet extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/emojis';
    }

    public function __construct() {}
}
