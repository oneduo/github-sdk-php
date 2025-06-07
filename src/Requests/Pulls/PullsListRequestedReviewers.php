<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Pulls;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/list-requested-reviewers
 *
 * Gets the users or teams whose review is requested for a pull request. Once a requested reviewer
 * submits a review, they are no longer considered a requested reviewer. Their review will instead be
 * returned by the [List reviews for a pull
 * request](https://docs.github.com/rest/pulls/reviews#list-reviews-for-a-pull-request) operation.
 */
class PullsListRequestedReviewers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}/requested_reviewers";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
    ) {}
}
