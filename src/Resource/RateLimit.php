<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\RateLimit\RateLimitGet;
use Saloon\Http\Response;

class RateLimit extends GitHubResource {
    public function rateLimitGet(): Response {
        return $this->connector->send(new RateLimitGet);
    }
}
