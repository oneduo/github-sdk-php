<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodesOfConduct;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codes-of-conduct/get-all-codes-of-conduct
 *
 * Returns array of all GitHub's codes of conduct.
 */
class CodesOfConductGetAllCodesOfConduct extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return '/codes_of_conduct';
    }

    public function __construct() {}
}
