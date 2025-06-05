<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-artifact
 *
 * Gets a specific artifact for a workflow run.
 *
 * Anyone with read access to the repository can use this
 * endpoint.
 *
 * If the repository is private, OAuth tokens and personal access tokens (classic) need the
 * `repo` scope to use this endpoint.
 */
class ActionsGetArtifact extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/artifacts/{$this->artifactId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $artifactId  The unique identifier of the artifact.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $artifactId,
    ) {}
}
