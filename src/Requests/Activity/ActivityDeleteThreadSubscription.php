<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/delete-thread-subscription
 *
 * Mutes all future notifications for a conversation until you comment on the thread or get an
 *
 * **@mention**. If you are watching the repository of the thread, you will still receive
 * notifications. To ignore future notifications for a repository you are watching, use the [Set a
 * thread subscription](https://docs.github.com/rest/activity/notifications#set-a-thread-subscription)
 * endpoint and set `ignore` to `true`.
 */
class ActivityDeleteThreadSubscription extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/notifications/threads/{$this->threadId}/subscription";
    }

    /**
     * @param  int  $threadId  The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function __construct(
        protected int $threadId,
    ) {}
}
