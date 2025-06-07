<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/set-thread-subscription
 *
 * If you are watching a repository, you receive notifications for all threads by default. Use this
 * endpoint to ignore future notifications for threads until you comment on the thread or get an
 *
 * **@mention**.
 *
 * You can also use this endpoint to subscribe to threads that you are currently not
 * receiving notifications for or to subscribed to threads that you have previously
 * ignored.
 *
 * Unsubscribing from a conversation in a repository that you are not watching is
 * functionally equivalent to the [Delete a thread
 * subscription](https://docs.github.com/rest/activity/notifications#delete-a-thread-subscription)
 * endpoint.
 */
class ActivitySetThreadSubscription extends Request
{
    protected Method $method = Method::PUT;

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
