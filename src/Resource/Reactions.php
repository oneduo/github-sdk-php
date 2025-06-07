<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForCommitComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForIssue;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForIssueComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForPullRequestReviewComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForRelease;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForTeamDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForTeamDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForTeamDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsCreateForTeamDiscussionLegacy;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForCommitComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForIssue;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForIssueComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForPullRequestComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForRelease;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForTeamDiscussion;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsDeleteForTeamDiscussionComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForCommitComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForIssue;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForIssueComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForPullRequestReviewComment;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForRelease;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForTeamDiscussionCommentInOrg;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForTeamDiscussionCommentLegacy;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForTeamDiscussionInOrg;
use Oneduo\GitHubSdk\Requests\Reactions\ReactionsListForTeamDiscussionLegacy;
use Saloon\Http\Response;

class Reactions extends GitHubResource
{
    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion comment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForTeamDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber, $content, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function createForTeamDiscussionCommentInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionCommentInOrg($org, $teamSlug, $discussionNumber, $commentNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForTeamDiscussionComment(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $commentNumber,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForTeamDiscussionComment($org, $teamSlug, $discussionNumber, $commentNumber, $reactionId));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForTeamDiscussionInOrg(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionInOrg($org, $teamSlug, $discussionNumber, $content, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function createForTeamDiscussionInOrg(string $org, string $teamSlug, int $discussionNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionInOrg($org, $teamSlug, $discussionNumber));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $teamSlug  The slug of the team name.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForTeamDiscussion(
        string $org,
        string $teamSlug,
        int $discussionNumber,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForTeamDiscussion($org, $teamSlug, $discussionNumber, $reactionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a commit comment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForCommitComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForCommitComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function createForCommitComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForCommitComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForCommitComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForCommitComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to an issue comment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForIssueComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForIssueComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function createForIssueComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForIssueComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForIssueComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForIssueComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to an issue.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForIssue(
        string $owner,
        string $repo,
        int $issueNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForIssue($owner, $repo, $issueNumber, $content, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function createForIssue(string $owner, string $repo, int $issueNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForIssue($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForIssue(string $owner, string $repo, int $issueNumber, int $reactionId): Response
    {
        return $this->connector->send(new ReactionsDeleteForIssue($owner, $repo, $issueNumber, $reactionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a pull request review comment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForPullRequestReviewComment(
        string $owner,
        string $repo,
        int $commentId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForPullRequestReviewComment($owner, $repo, $commentId, $content, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function createForPullRequestReviewComment(string $owner, string $repo, int $commentId): Response
    {
        return $this->connector->send(new ReactionsCreateForPullRequestReviewComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForPullRequestComment(
        string $owner,
        string $repo,
        int $commentId,
        int $reactionId,
    ): Response {
        return $this->connector->send(new ReactionsDeleteForPullRequestComment($owner, $repo, $commentId, $reactionId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a release.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForRelease(
        string $owner,
        string $repo,
        int $releaseId,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForRelease($owner, $repo, $releaseId, $content, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     */
    public function createForRelease(string $owner, string $repo, int $releaseId): Response
    {
        return $this->connector->send(new ReactionsCreateForRelease($owner, $repo, $releaseId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $releaseId  The unique identifier of the release.
     * @param  int  $reactionId  The unique identifier of the reaction.
     */
    public function deleteForRelease(string $owner, string $repo, int $releaseId, int $reactionId): Response
    {
        return $this->connector->send(new ReactionsDeleteForRelease($owner, $repo, $releaseId, $reactionId));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion comment.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForTeamDiscussionCommentLegacy(
        int $teamId,
        int $discussionNumber,
        int $commentNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber, $content, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  int  $commentNumber  The number that identifies the comment.
     */
    public function createForTeamDiscussionCommentLegacy(
        int $teamId,
        int $discussionNumber,
        int $commentNumber,
    ): Response {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionCommentLegacy($teamId, $discussionNumber, $commentNumber));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     * @param  string  $content  Returns a single [reaction type](https://docs.github.com/rest/reactions/reactions#about-reactions). Omit this parameter to list all reactions to a team discussion.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function listForTeamDiscussionLegacy(
        int $teamId,
        int $discussionNumber,
        ?string $content,
        ?int $page,
    ): Response {
        return $this->connector->send(new ReactionsListForTeamDiscussionLegacy($teamId, $discussionNumber, $content, $page));
    }

    /**
     * @param  int  $teamId  The unique identifier of the team.
     * @param  int  $discussionNumber  The number that identifies the discussion.
     */
    public function createForTeamDiscussionLegacy(int $teamId, int $discussionNumber): Response
    {
        return $this->connector->send(new ReactionsCreateForTeamDiscussionLegacy($teamId, $discussionNumber));
    }
}
