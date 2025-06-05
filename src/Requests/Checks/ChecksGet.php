<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * checks/get
 *
 * Gets a single check run using its `id`.
 *
 * > [!NOTE]
 * > The Checks API only looks for pushes in the
 * repository where the check suite or check run were created. Pushes to a branch in a forked
 * repository are not detected and return an empty `pull_requests` array.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `repo` scope to use this endpoint on a private repository.
 */
class ChecksGet extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/check-runs/{$this->checkRunId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $checkRunId  The unique identifier of the check run.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $checkRunId,
    ) {}
}
