<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Pulls\PullsCheckIfMerged;
use Oneduo\GitHubSdk\Requests\Pulls\PullsCreate;
use Oneduo\GitHubSdk\Requests\Pulls\PullsCreateReplyForReviewComment;
use Oneduo\GitHubSdk\Requests\Pulls\PullsCreateReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsCreateReviewComment;
use Oneduo\GitHubSdk\Requests\Pulls\PullsDeletePendingReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsDeleteReviewComment;
use Oneduo\GitHubSdk\Requests\Pulls\PullsDismissReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsGet;
use Oneduo\GitHubSdk\Requests\Pulls\PullsGetReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsGetReviewComment;
use Oneduo\GitHubSdk\Requests\Pulls\PullsList;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListCommentsForReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListCommits;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListFiles;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListRequestedReviewers;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListReviewComments;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListReviewCommentsForRepo;
use Oneduo\GitHubSdk\Requests\Pulls\PullsListReviews;
use Oneduo\GitHubSdk\Requests\Pulls\PullsMerge;
use Oneduo\GitHubSdk\Requests\Pulls\PullsRemoveRequestedReviewers;
use Oneduo\GitHubSdk\Requests\Pulls\PullsRequestReviewers;
use Oneduo\GitHubSdk\Requests\Pulls\PullsSubmitReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsUpdate;
use Oneduo\GitHubSdk\Requests\Pulls\PullsUpdateBranch;
use Oneduo\GitHubSdk\Requests\Pulls\PullsUpdateReview;
use Oneduo\GitHubSdk\Requests\Pulls\PullsUpdateReviewComment;
use Saloon\Http\Response;

class Pulls extends GitHubResource {
    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $state  Either `open`, `closed`, or `all` to filter by state.
     * @param  string  $head  Filter pulls by head user or head organization and branch name in the format of `user:ref-name` or `organization:ref-name`. For example: `github:new-script-format` or `octocat:test-branch`.
     * @param  string  $base  Filter pulls by base branch name. Example: `gh-pages`.
     * @param  string  $sort  What to sort results by. `popularity` will sort by the number of comments. `long-running` will sort by date created and will limit the results to pull requests that have been open for more than a month and have had activity within the past month.
     * @param  string  $direction  The direction of the sort. Default: `desc` when sort is `created` or sort is not specified, otherwise `asc`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsList(
        string $owner,
        string $repo,
        ?string $state,
        ?string $head,
        ?string $base,
        ?string $sort,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new PullsList($owner, $repo, $state, $head, $base, $sort, $direction, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function pullsCreate(string $owner, string $repo): Response {
        return $this->connector->send(new PullsCreate($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $direction  The direction to sort results. Ignored without `sort` parameter.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListReviewCommentsForRepo(
        string $owner,
        string $repo,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new PullsListReviewCommentsForRepo($owner, $repo, $sort, $direction, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function pullsGetReviewComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new PullsGetReviewComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function pullsDeleteReviewComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new PullsDeleteReviewComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function pullsUpdateReviewComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new PullsUpdateReviewComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsGet(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsGet($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsUpdate(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsUpdate($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  The direction to sort results. Ignored without `sort` parameter.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListReviewComments(
        string $owner,
        string $repo,
        int $pullNumber,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new PullsListReviewComments($owner, $repo, $pullNumber, $sort, $direction, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsCreateReviewComment(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsCreateReviewComment($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function pullsCreateReplyForReviewComment(
        string $owner,
        string $repo,
        int $pullNumber,
        int $commentId,
    ): Response {
        return $this->connector->send(new PullsCreateReplyForReviewComment($owner, $repo, $pullNumber, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListCommits(string $owner, string $repo, int $pullNumber, ?int $page): Response {
        return $this->connector->send(new PullsListCommits($owner, $repo, $pullNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListFiles(string $owner, string $repo, int $pullNumber, ?int $page): Response {
        return $this->connector->send(new PullsListFiles($owner, $repo, $pullNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsCheckIfMerged(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsCheckIfMerged($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsMerge(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsMerge($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsListRequestedReviewers(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsListRequestedReviewers($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsRequestReviewers(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsRequestReviewers($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsRemoveRequestedReviewers(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsRemoveRequestedReviewers($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListReviews(string $owner, string $repo, int $pullNumber, ?int $page): Response {
        return $this->connector->send(new PullsListReviews($owner, $repo, $pullNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsCreateReview(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsCreateReview($owner, $repo, $pullNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     */
    public function pullsGetReview(string $owner, string $repo, int $pullNumber, int $reviewId): Response {
        return $this->connector->send(new PullsGetReview($owner, $repo, $pullNumber, $reviewId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     */
    public function pullsUpdateReview(string $owner, string $repo, int $pullNumber, int $reviewId): Response {
        return $this->connector->send(new PullsUpdateReview($owner, $repo, $pullNumber, $reviewId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     */
    public function pullsDeletePendingReview(string $owner, string $repo, int $pullNumber, int $reviewId): Response {
        return $this->connector->send(new PullsDeletePendingReview($owner, $repo, $pullNumber, $reviewId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function pullsListCommentsForReview(
        string $owner,
        string $repo,
        int $pullNumber,
        int $reviewId,
        ?int $page,
    ): Response {
        return $this->connector->send(new PullsListCommentsForReview($owner, $repo, $pullNumber, $reviewId, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     */
    public function pullsDismissReview(string $owner, string $repo, int $pullNumber, int $reviewId): Response {
        return $this->connector->send(new PullsDismissReview($owner, $repo, $pullNumber, $reviewId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     * @param  int  $reviewId  The unique identifier of the review.
     */
    public function pullsSubmitReview(string $owner, string $repo, int $pullNumber, int $reviewId): Response {
        return $this->connector->send(new PullsSubmitReview($owner, $repo, $pullNumber, $reviewId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $pullNumber  The number that identifies the pull request.
     */
    public function pullsUpdateBranch(string $owner, string $repo, int $pullNumber): Response {
        return $this->connector->send(new PullsUpdateBranch($owner, $repo, $pullNumber));
    }
}
