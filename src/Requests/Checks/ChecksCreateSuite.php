<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Checks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * checks/create-suite
 *
 * Creates a check suite manually. By default, check suites are automatically created when you create a
 * [check run](https://docs.github.com/rest/checks/runs). You only need to use this endpoint for
 * manually creating check suites when you've disabled automatic creation using "[Update repository
 * preferences for check
 * suites](https://docs.github.com/rest/checks/suites#update-repository-preferences-for-check-suites)".
 *
 * >
 * [!NOTE]
 * > The Checks API only looks for pushes in the repository where the check suite or check run
 * were created. Pushes to a branch in a forked repository are not detected and return an empty
 * `pull_requests` array and a `null` value for `head_branch`.
 *
 * OAuth apps and personal access tokens
 * (classic) cannot use this endpoint.
 */
class ChecksCreateSuite extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/check-suites";
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
