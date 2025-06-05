<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Licenses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * licenses/get
 *
 * Gets information about a specific license. For more information, see "[Licensing a repository
 * ](https://docs.github.com/repositories/managing-your-repositorys-settings-and-features/customizing-your-repository/licensing-a-repository)."
 */
class LicensesGet extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/licenses/{$this->license}";
    }

    public function __construct(
        protected string $license,
    ) {}
}
