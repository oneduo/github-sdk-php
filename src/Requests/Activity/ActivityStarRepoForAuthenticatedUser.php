<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/star-repo-for-authenticated-user
 *
 * Note that you'll need to set `Content-Length` to zero when calling out to this endpoint. For more
 * information, see "[HTTP
 * method](https://docs.github.com/rest/guides/getting-started-with-the-rest-api#http-method)."
 */
class ActivityStarRepoForAuthenticatedUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/user/starred/{$this->owner}/{$this->repo}";
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
