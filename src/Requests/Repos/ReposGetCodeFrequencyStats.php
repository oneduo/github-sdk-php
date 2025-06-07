<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-code-frequency-stats
 *
 * Returns a weekly aggregate of the number of additions and deletions pushed to a repository.
 *
 * >
 * [!NOTE]
 * > This endpoint can only be used for repositories with fewer than 10,000 commits. If the
 * repository contains 10,000 or more commits, a 422 status code will be returned.
 */
class ReposGetCodeFrequencyStats extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/stats/code_frequency";
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
