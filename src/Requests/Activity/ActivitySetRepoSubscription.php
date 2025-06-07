<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/set-repo-subscription
 *
 * If you would like to watch a repository, set `subscribed` to `true`. If you would like to ignore
 * notifications made within a repository, set `ignored` to `true`. If you would like to stop watching
 * a repository, [delete the repository's
 * subscription](https://docs.github.com/rest/activity/watching#delete-a-repository-subscription)
 * completely.
 */
class ActivitySetRepoSubscription extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/subscription";
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
