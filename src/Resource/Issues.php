<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Resource;

use Oneduo\GitHubSdk\GitHubResource;
use Oneduo\GitHubSdk\Requests\Issues\IssuesAddAssignees;
use Oneduo\GitHubSdk\Requests\Issues\IssuesAddLabels;
use Oneduo\GitHubSdk\Requests\Issues\IssuesAddSubIssue;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCheckUserCanBeAssigned;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCheckUserCanBeAssignedToIssue;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCreate;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCreateComment;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCreateLabel;
use Oneduo\GitHubSdk\Requests\Issues\IssuesCreateMilestone;
use Oneduo\GitHubSdk\Requests\Issues\IssuesDeleteComment;
use Oneduo\GitHubSdk\Requests\Issues\IssuesDeleteLabel;
use Oneduo\GitHubSdk\Requests\Issues\IssuesDeleteMilestone;
use Oneduo\GitHubSdk\Requests\Issues\IssuesGet;
use Oneduo\GitHubSdk\Requests\Issues\IssuesGetComment;
use Oneduo\GitHubSdk\Requests\Issues\IssuesGetEvent;
use Oneduo\GitHubSdk\Requests\Issues\IssuesGetLabel;
use Oneduo\GitHubSdk\Requests\Issues\IssuesGetMilestone;
use Oneduo\GitHubSdk\Requests\Issues\IssuesList;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListAssignees;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListComments;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListCommentsForRepo;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListEvents;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListEventsForRepo;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListEventsForTimeline;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListForAuthenticatedUser;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListForOrg;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListForRepo;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListLabelsForMilestone;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListLabelsForRepo;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListLabelsOnIssue;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListMilestones;
use Oneduo\GitHubSdk\Requests\Issues\IssuesListSubIssues;
use Oneduo\GitHubSdk\Requests\Issues\IssuesLock;
use Oneduo\GitHubSdk\Requests\Issues\IssuesRemoveAllLabels;
use Oneduo\GitHubSdk\Requests\Issues\IssuesRemoveAssignees;
use Oneduo\GitHubSdk\Requests\Issues\IssuesRemoveLabel;
use Oneduo\GitHubSdk\Requests\Issues\IssuesRemoveSubIssue;
use Oneduo\GitHubSdk\Requests\Issues\IssuesReprioritizeSubIssue;
use Oneduo\GitHubSdk\Requests\Issues\IssuesSetLabels;
use Oneduo\GitHubSdk\Requests\Issues\IssuesUnlock;
use Oneduo\GitHubSdk\Requests\Issues\IssuesUpdate;
use Oneduo\GitHubSdk\Requests\Issues\IssuesUpdateComment;
use Oneduo\GitHubSdk\Requests\Issues\IssuesUpdateLabel;
use Oneduo\GitHubSdk\Requests\Issues\IssuesUpdateMilestone;
use Saloon\Http\Response;

class Issues extends GitHubResource {
    /**
     * @param  string  $filter  Indicates which sorts of issues to return. `assigned` means issues assigned to you. `created` means issues created by you. `mentioned` means issues mentioning you. `subscribed` means issues you're subscribed to updates for. `all` or `repos` means all issues you can see, regardless of participation or creation.
     * @param  string  $state  Indicates the state of the issues to return.
     * @param  string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  string  $sort  What to sort results by.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesList(
        ?string $filter,
        ?string $state,
        ?string $labels,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?bool $collab,
        ?bool $orgs,
        ?bool $owned,
        ?bool $pulls,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesList($filter, $state, $labels, $sort, $direction, $since, $collab, $orgs, $owned, $pulls, $page));
    }

    /**
     * @param  string  $org  The organization name. The name is not case sensitive.
     * @param  string  $filter  Indicates which sorts of issues to return. `assigned` means issues assigned to you. `created` means issues created by you. `mentioned` means issues mentioning you. `subscribed` means issues you're subscribed to updates for. `all` or `repos` means all issues you can see, regardless of participation or creation.
     * @param  string  $state  Indicates the state of the issues to return.
     * @param  string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  string  $type  Can be the name of an issue type.
     * @param  string  $sort  What to sort results by.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListForOrg(
        string $org,
        ?string $filter,
        ?string $state,
        ?string $labels,
        ?string $type,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListForOrg($org, $filter, $state, $labels, $type, $sort, $direction, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListAssignees(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new IssuesListAssignees($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesCheckUserCanBeAssigned(string $owner, string $repo, string $assignee): Response {
        return $this->connector->send(new IssuesCheckUserCanBeAssigned($owner, $repo, $assignee));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $milestone  If an `integer` is passed, it should refer to a milestone by its `number` field. If the string `*` is passed, issues with any milestone are accepted. If the string `none` is passed, issues without milestones are returned.
     * @param  string  $state  Indicates the state of the issues to return.
     * @param  string  $assignee  Can be the name of a user. Pass in `none` for issues with no assigned user, and `*` for issues assigned to any user.
     * @param  string  $type  Can be the name of an issue type. If the string `*` is passed, issues with any type are accepted. If the string `none` is passed, issues without type are returned.
     * @param  string  $creator  The user that created the issue.
     * @param  string  $mentioned  A user that's mentioned in the issue.
     * @param  string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  string  $sort  What to sort results by.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListForRepo(
        string $owner,
        string $repo,
        ?string $milestone,
        ?string $state,
        ?string $assignee,
        ?string $type,
        ?string $creator,
        ?string $mentioned,
        ?string $labels,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListForRepo($owner, $repo, $milestone, $state, $assignee, $type, $creator, $mentioned, $labels, $sort, $direction, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesCreate(string $owner, string $repo): Response {
        return $this->connector->send(new IssuesCreate($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $sort  The property to sort the results by.
     * @param  string  $direction  Either `asc` or `desc`. Ignored without the `sort` parameter.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListCommentsForRepo(
        string $owner,
        string $repo,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListCommentsForRepo($owner, $repo, $sort, $direction, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function issuesGetComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new IssuesGetComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function issuesDeleteComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new IssuesDeleteComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $commentId  The unique identifier of the comment.
     */
    public function issuesUpdateComment(string $owner, string $repo, int $commentId): Response {
        return $this->connector->send(new IssuesUpdateComment($owner, $repo, $commentId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListEventsForRepo(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new IssuesListEventsForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesGetEvent(string $owner, string $repo, int $eventId): Response {
        return $this->connector->send(new IssuesGetEvent($owner, $repo, $eventId));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesGet(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesGet($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesUpdate(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesUpdate($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesAddAssignees(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesAddAssignees($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesRemoveAssignees(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesRemoveAssignees($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesCheckUserCanBeAssignedToIssue(
        string $owner,
        string $repo,
        int $issueNumber,
        string $assignee,
    ): Response {
        return $this->connector->send(new IssuesCheckUserCanBeAssignedToIssue($owner, $repo, $issueNumber, $assignee));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListComments(
        string $owner,
        string $repo,
        int $issueNumber,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListComments($owner, $repo, $issueNumber, $since, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesCreateComment(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesCreateComment($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListEvents(string $owner, string $repo, int $issueNumber, ?int $page): Response {
        return $this->connector->send(new IssuesListEvents($owner, $repo, $issueNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListLabelsOnIssue(string $owner, string $repo, int $issueNumber, ?int $page): Response {
        return $this->connector->send(new IssuesListLabelsOnIssue($owner, $repo, $issueNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesSetLabels(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesSetLabels($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesAddLabels(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesAddLabels($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesRemoveAllLabels(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesRemoveAllLabels($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesRemoveLabel(string $owner, string $repo, int $issueNumber, string $name): Response {
        return $this->connector->send(new IssuesRemoveLabel($owner, $repo, $issueNumber, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesLock(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesLock($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesUnlock(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesUnlock($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesRemoveSubIssue(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesRemoveSubIssue($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListSubIssues(string $owner, string $repo, int $issueNumber, ?int $page): Response {
        return $this->connector->send(new IssuesListSubIssues($owner, $repo, $issueNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesAddSubIssue(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesAddSubIssue($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function issuesReprioritizeSubIssue(string $owner, string $repo, int $issueNumber): Response {
        return $this->connector->send(new IssuesReprioritizeSubIssue($owner, $repo, $issueNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListEventsForTimeline(string $owner, string $repo, int $issueNumber, ?int $page): Response {
        return $this->connector->send(new IssuesListEventsForTimeline($owner, $repo, $issueNumber, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListLabelsForRepo(string $owner, string $repo, ?int $page): Response {
        return $this->connector->send(new IssuesListLabelsForRepo($owner, $repo, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesCreateLabel(string $owner, string $repo): Response {
        return $this->connector->send(new IssuesCreateLabel($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesGetLabel(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new IssuesGetLabel($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesDeleteLabel(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new IssuesDeleteLabel($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesUpdateLabel(string $owner, string $repo, string $name): Response {
        return $this->connector->send(new IssuesUpdateLabel($owner, $repo, $name));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  string  $state  The state of the milestone. Either `open`, `closed`, or `all`.
     * @param  string  $sort  What to sort results by. Either `due_on` or `completeness`.
     * @param  string  $direction  The direction of the sort. Either `asc` or `desc`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListMilestones(
        string $owner,
        string $repo,
        ?string $state,
        ?string $sort,
        ?string $direction,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListMilestones($owner, $repo, $state, $sort, $direction, $page));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function issuesCreateMilestone(string $owner, string $repo): Response {
        return $this->connector->send(new IssuesCreateMilestone($owner, $repo));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $milestoneNumber  The number that identifies the milestone.
     */
    public function issuesGetMilestone(string $owner, string $repo, int $milestoneNumber): Response {
        return $this->connector->send(new IssuesGetMilestone($owner, $repo, $milestoneNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $milestoneNumber  The number that identifies the milestone.
     */
    public function issuesDeleteMilestone(string $owner, string $repo, int $milestoneNumber): Response {
        return $this->connector->send(new IssuesDeleteMilestone($owner, $repo, $milestoneNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $milestoneNumber  The number that identifies the milestone.
     */
    public function issuesUpdateMilestone(string $owner, string $repo, int $milestoneNumber): Response {
        return $this->connector->send(new IssuesUpdateMilestone($owner, $repo, $milestoneNumber));
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $milestoneNumber  The number that identifies the milestone.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListLabelsForMilestone(string $owner, string $repo, int $milestoneNumber, ?int $page): Response {
        return $this->connector->send(new IssuesListLabelsForMilestone($owner, $repo, $milestoneNumber, $page));
    }

    /**
     * @param  string  $filter  Indicates which sorts of issues to return. `assigned` means issues assigned to you. `created` means issues created by you. `mentioned` means issues mentioning you. `subscribed` means issues you're subscribed to updates for. `all` or `repos` means all issues you can see, regardless of participation or creation.
     * @param  string  $state  Indicates the state of the issues to return.
     * @param  string  $labels  A list of comma separated label names. Example: `bug,ui,@high`
     * @param  string  $sort  What to sort results by.
     * @param  string  $direction  The direction to sort the results by.
     * @param  string  $since  Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  int  $page  The page number of the results to fetch. For more information, see "[Using pagination in the REST API](https://docs.github.com/rest/using-the-rest-api/using-pagination-in-the-rest-api)."
     */
    public function issuesListForAuthenticatedUser(
        ?string $filter,
        ?string $state,
        ?string $labels,
        ?string $sort,
        ?string $direction,
        ?string $since,
        ?int $page,
    ): Response {
        return $this->connector->send(new IssuesListForAuthenticatedUser($filter, $state, $labels, $sort, $direction, $since, $page));
    }
}
