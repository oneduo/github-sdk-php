<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/follow
 *
 * Note that you'll need to set `Content-Length` to zero when calling out to this endpoint. For more
 * information, see "[HTTP
 * verbs](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `user:follow` scope to use this endpoint.
 */
class UsersFollow extends Request {
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string {
        return "/user/following/{$this->username}";
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {}
}
