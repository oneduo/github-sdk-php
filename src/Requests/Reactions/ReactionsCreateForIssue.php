<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-issue
 *
 * Create a reaction to an [issue](https://docs.github.com/rest/issues/issues#get-an-issue). A response
 * with an HTTP `200` status means that you already added the reaction type to this issue.
 */
class ReactionsCreateForIssue extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/reactions";
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
