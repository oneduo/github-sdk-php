<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * issues/reprioritize-sub-issue
 *
 * You can use the REST API to reprioritize a sub-issue to a different position in the parent list.
 */
class IssuesReprioritizeSubIssue extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/sub_issues/priority";
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
    ) {}
}
