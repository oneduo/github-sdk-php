<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodesOfConduct;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codes-of-conduct/get-conduct-code
 *
 * Returns information about the specified GitHub code of conduct.
 */
class CodesOfConductGetConductCode extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/codes_of_conduct/{$this->key}";
    }

    public function __construct(
        protected string $key,
    ) {}
}
