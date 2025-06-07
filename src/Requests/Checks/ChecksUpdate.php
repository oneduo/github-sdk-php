<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/update
 *
 * Updates a check run for a specific commit in a repository.
 *
 * > [!NOTE]
 * > The endpoints to manage
 * checks only look for pushes in the repository where the check suite or check run were created.
 * Pushes to a branch in a forked repository are not detected and return an empty `pull_requests`
 * array.
 *
 * OAuth apps and personal access tokens (classic) cannot use this endpoint.
 */
class ChecksUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
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
