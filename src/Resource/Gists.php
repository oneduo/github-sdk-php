<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Gists\GistsCheckIsStarred;
use Oneduo\GitHubSdk\Requests\Gists\GistsCreate;
use Oneduo\GitHubSdk\Requests\Gists\GistsCreateComment;
use Oneduo\GitHubSdk\Requests\Gists\GistsDelete;
use Oneduo\GitHubSdk\Requests\Gists\GistsDeleteComment;
use Oneduo\GitHubSdk\Requests\Gists\GistsFork;
use Oneduo\GitHubSdk\Requests\Gists\GistsGet;
use Oneduo\GitHubSdk\Requests\Gists\GistsGetComment;
use Oneduo\GitHubSdk\Requests\Gists\GistsGetRevision;
use Oneduo\GitHubSdk\Requests\Gists\GistsList;
use Oneduo\GitHubSdk\Requests\Gists\GistsListComments;
use Oneduo\GitHubSdk\Requests\Gists\GistsListCommits;
use Oneduo\GitHubSdk\Requests\Gists\GistsListForks;
use Oneduo\GitHubSdk\Requests\Gists\GistsListForUser;
use Oneduo\GitHubSdk\Requests\Gists\GistsListPublic;
use Oneduo\GitHubSdk\Requests\Gists\GistsListStarred;
use Oneduo\GitHubSdk\Requests\Gists\GistsStar;
use Oneduo\GitHubSdk\Requests\Gists\GistsUnstar;
use Oneduo\GitHubSdk\Requests\Gists\GistsUpdate;
use Oneduo\GitHubSdk\Requests\Gists\GistsUpdateComment;
use Saloon\Http\Response;

class Gists extends GitHubResource
{
    /**
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function list(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsList($since, $page));
    }

    public function create(): Response
    {
        return $this->connector->send(new GistsCreate);
    }

    /**
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listPublic(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListPublic($since, $page));
    }

    /**
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listStarred(?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListStarred($since, $page));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function get(string $gistId): Response
    {
        return $this->connector->send(new GistsGet($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function delete(string $gistId): Response
    {
        return $this->connector->send(new GistsDelete($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function update(string $gistId): Response
    {
        return $this->connector->send(new GistsUpdate($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listComments(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListComments($gistId, $page));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function createComment(string $gistId): Response
    {
        return $this->connector->send(new GistsCreateComment($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function getComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsGetComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function deleteComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsDeleteComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function updateComment(string $gistId, int $commentId): Response
    {
        return $this->connector->send(new GistsUpdateComment($gistId, $commentId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listCommits(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListCommits($gistId, $page));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForks(string $gistId, ?int $page): Response
    {
        return $this->connector->send(new GistsListForks($gistId, $page));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function fork(string $gistId): Response
    {
        return $this->connector->send(new GistsFork($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function checkIsStarred(string $gistId): Response
    {
        return $this->connector->send(new GistsCheckIsStarred($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function star(string $gistId): Response
    {
        return $this->connector->send(new GistsStar($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function unstar(string $gistId): Response
    {
        return $this->connector->send(new GistsUnstar($gistId));
    }

    /**
     * @param  string  $gistId  The unique identifier of the gist.
     */
    public function getRevision(string $gistId, string $sha): Response
    {
        return $this->connector->send(new GistsGetRevision($gistId, $sha));
    }

    /**
     * @param  string  $username  The handle for the GitHub user account.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForUser(string $username, ?string $since, ?int $page): Response
    {
        return $this->connector->send(new GistsListForUser($username, $since, $page));
    }
}
