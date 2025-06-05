<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/check-user-can-be-assigned
 *
 * Checks if a user has permission to be assigned to an issue in this repository.
 *
 * If the `assignee`
 * can be assigned to issues in the repository, a `204` header with no content is returned.
 *
 * Otherwise
 * a `404` status code is returned.
 */
class IssuesCheckUserCanBeAssigned extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/assignees/{$this->assignee}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $assignee,
    ) {}
}
