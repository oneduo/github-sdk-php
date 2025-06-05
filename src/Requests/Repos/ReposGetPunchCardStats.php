<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-punch-card-stats
 *
 * Each array contains the day number, hour number, and number of commits:
 *
 * *   `0-6`: Sunday -
 * Saturday
 * *   `0-23`: Hour of day
 * *   Number of commits
 *
 * For example, `[2, 14, 25]` indicates that
 * there were 25 total commits, during the 2:00pm hour on Tuesdays. All times are based on the time
 * zone of individual commits.
 */
class ReposGetPunchCardStats extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/stats/punch_card";
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
