<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/check-user-can-be-assigned-to-issue
 *
 * Checks if a user has permission to be assigned to a specific issue.
 *
 * If the `assignee` can be
 * assigned to this issue, a `204` status code with no content is returned.
 *
 * Otherwise a `404` status
 * code is returned.
 */
class IssuesCheckUserCanBeAssignedToIssue extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/assignees/{$this->assignee}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $issueNumber  The number that identifies the issue.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $issueNumber,
        protected string $assignee,
    ) {}
}
