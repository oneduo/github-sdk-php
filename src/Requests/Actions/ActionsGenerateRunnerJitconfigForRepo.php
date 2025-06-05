<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/generate-runner-jitconfig-for-repo
 *
 * Generates a configuration that can be passed to the runner application at startup.
 *
 * The
 * authenticated user must have admin access to the repository.
 *
 * OAuth tokens and personal access
 * tokens (classic) need the`repo` scope to use this endpoint.
 */
class ActionsGenerateRunnerJitconfigForRepo extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/generate-jitconfig";
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
