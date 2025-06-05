<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Migrations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * migrations/start-for-authenticated-user
 *
 * Initiates the generation of a user migration archive.
 */
class MigrationsStartForAuthenticatedUser extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return '/user/migrations';
    }

    public function __construct() {}
}
