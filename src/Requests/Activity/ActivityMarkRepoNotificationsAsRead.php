<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/mark-repo-notifications-as-read
 *
 * Marks all notifications in a repository as "read" for the current user. If the number of
 * notifications is too large to complete in one request, you will receive a `202 Accepted` status and
 * GitHub will run an asynchronous process to mark notifications as "read." To check whether any
 * "unread" notifications remain, you can use the [List repository notifications for the authenticated
 * user](https://docs.github.com/rest/activity/notifications#list-repository-notifications-for-the-authenticated-user)
 * endpoint and pass the query parameter `all=false`.
 */
class ActivityMarkRepoNotificationsAsRead extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/notifications";
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
