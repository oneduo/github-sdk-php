<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/mark-thread-as-done
 *
 * Marks a thread as "done." Marking a thread as "done" is equivalent to marking a notification in your
 * notification inbox on GitHub as done: https://github.com/notifications.
 */
class ActivityMarkThreadAsDone extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/notifications/threads/{$this->threadId}";
    }

    /**
     * @param  int  $threadId  The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function __construct(
        protected int $threadId,
    ) {}
}
