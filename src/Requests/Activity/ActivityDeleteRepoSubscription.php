<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/delete-repo-subscription
 *
 * This endpoint should only be used to stop watching a repository. To control whether or not you wish
 * to receive notifications from a repository, [set the repository's subscription
 * manually](https://docs.github.com/rest/activity/watching#set-a-repository-subscription).
 */
class ActivityDeleteRepoSubscription extends Request
{
    protected Method $method = Method::DELETE;

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
