<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/download-job-logs-for-workflow-run
 *
 * Gets a redirect URL to download a plain text file of logs for a workflow job. This link expires
 * after 1 minute. Look
 * for `Location:` in the response header to find the URL for the
 * download.
 *
 * Anyone with read access to the repository can use this endpoint.
 *
 * If the repository is
 * private, OAuth tokens and personal access tokens (classic) need the `repo` scope to use this
 * endpoint.
 */
class ActionsDownloadJobLogsForWorkflowRun extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/jobs/{$this->jobId}/logs";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $jobId  The unique identifier of the job.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $jobId,
    ) {}
}
