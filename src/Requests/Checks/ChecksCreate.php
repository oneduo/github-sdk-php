<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/create
 *
 * Creates a new check run for a specific commit in a repository.
 *
 * To create a check run, you must use
 * a GitHub App. OAuth apps and authenticated users are not able to create a check suite.
 *
 * In a check
 * suite, GitHub limits the number of check runs with the same name to 1000. Once these check runs
 * exceed 1000, GitHub will start to automatically delete older check runs.
 *
 * > [!NOTE]
 * > The Checks API
 * only looks for pushes in the repository where the check suite or check run were created. Pushes to a
 * branch in a forked repository are not detected and return an empty `pull_requests` array.
 */
class ChecksCreate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-runs";
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
