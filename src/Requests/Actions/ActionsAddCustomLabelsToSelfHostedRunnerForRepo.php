<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/add-custom-labels-to-self-hosted-runner-for-repo
 *
 * Adds custom labels to a self-hosted runner configured in a repository.
 *
 * Authenticated users must
 * have admin access to the organization to use this endpoint.
 *
 * OAuth tokens and personal access tokens
 * (classic) need the `repo` scope to use this endpoint.
 */
class ActionsAddCustomLabelsToSelfHostedRunnerForRepo extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/{$this->runnerId}/labels";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $runnerId  Unique identifier of the self-hosted runner.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $runnerId,
    ) {}
}
