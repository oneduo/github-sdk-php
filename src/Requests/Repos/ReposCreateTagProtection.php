<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-tag-protection
 *
 * > [!WARNING]
 * > **Closing down notice:** This operation is closing down and will be removed after
 * August 30, 2024. Use the "[Repository
 * Rulesets](https://docs.github.com/rest/repos/rules#create-a-repository-ruleset)" endpoint
 * instead.
 *
 * This creates a tag protection state for a repository.
 * This endpoint is only available to
 * repository administrators.
 */
class ReposCreateTagProtection extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/tags/protection";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
