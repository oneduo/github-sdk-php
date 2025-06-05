<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/mark-notifications-as-read
 *
 * Marks all notifications as "read" for the current user. If the number of notifications is too large
 * to complete in one request, you will receive a `202 Accepted` status and GitHub will run an
 * asynchronous process to mark notifications as "read." To check whether any "unread" notifications
 * remain, you can use the [List notifications for the authenticated
 * user](https://docs.github.com/rest/activity/notifications#list-notifications-for-the-authenticated-user)
 * endpoint and pass the query parameter `all=false`.
 */
class ActivityMarkNotificationsAsRead extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return '/notifications';
    }

    public function __construct() {}
}
