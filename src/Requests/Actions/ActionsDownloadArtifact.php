<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/download-artifact
 *
 * Gets a redirect URL to download an archive for a repository. This URL expires after 1 minute. Look
 * for `Location:` in
 * the response header to find the URL for the download. The `:archive_format` must
 * be `zip`.
 *
 * OAuth tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint.
 */
class ActionsDownloadArtifact extends Request {
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/actions/artifacts/{$this->artifactId}/{$this->archiveFormat}";
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
        protected string $archiveFormat,
    ) {}
}
