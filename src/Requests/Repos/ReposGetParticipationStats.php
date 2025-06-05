<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-participation-stats
 *
 * Returns the total commit counts for the `owner` and total commit counts in `all`. `all` is everyone
 * combined, including the `owner` in the last 52 weeks. If you'd like to get the commit counts for
 * non-owners, you can subtract `owner` from `all`.
 *
 * The array order is oldest week (index 0) to most
 * recent week.
 *
 * The most recent week is seven days ago at UTC midnight to today at UTC midnight.
 */
class ReposGetParticipationStats extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/stats/participation";
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
