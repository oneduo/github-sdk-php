<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/delete-milestone
 *
 * Deletes a milestone using the given milestone number.
 */
class IssuesDeleteMilestone extends Request {
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/milestones/{$this->milestoneNumber}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $milestoneNumber  The number that identifies the milestone.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $milestoneNumber,
    ) {}
}
