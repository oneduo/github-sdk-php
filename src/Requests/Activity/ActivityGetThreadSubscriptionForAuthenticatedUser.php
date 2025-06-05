<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/get-thread-subscription-for-authenticated-user
 *
 * This checks to see if the current user is subscribed to a thread. You can also [get a repository
 * subscription](https://docs.github.com/rest/activity/watching#get-a-repository-subscription).
 *
 * Note
 * that subscriptions are only generated if a user is participating in a conversation--for example,
 *
 * they've replied to the thread, were **@mentioned**, or manually subscribe to a thread.
 */
class ActivityGetThreadSubscriptionForAuthenticatedUser extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/notifications/threads/{$this->threadId}/subscription";
    }

    /**
     * @param  int  $threadId  The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function __construct(
        protected int $threadId,
    ) {}
}
