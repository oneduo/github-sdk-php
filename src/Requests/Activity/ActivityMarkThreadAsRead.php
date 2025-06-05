<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * activity/mark-thread-as-read
 *
 * Marks a thread as "read." Marking a thread as "read" is equivalent to clicking a notification in
 * your notification inbox on GitHub: https://github.com/notifications.
 */
class ActivityMarkThreadAsRead extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string {
        return "/notifications/threads/{$this->threadId}";
    }

    /**
     * @param  int  $threadId  The unique identifier of the notification thread. This corresponds to the value returned in the `id` field when you retrieve notifications (for example with the [`GET /notifications` operation](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)).
     */
    public function __construct(
        protected int $threadId,
    ) {}
}
