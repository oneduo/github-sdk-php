<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-commit-status
 *
 * Users with push access in a repository can create commit statuses for a given SHA.
 *
 * Note: there is a
 * limit of 1000 statuses per `sha` and `context` within a repository. Attempts to create more than
 * 1000 statuses will result in a validation error.
 */
class ReposCreateCommitStatus extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/statuses/{$this->sha}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $sha,
    ) {}
}
