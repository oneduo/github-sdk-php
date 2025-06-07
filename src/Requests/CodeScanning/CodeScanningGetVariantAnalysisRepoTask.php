<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-variant-analysis-repo-task
 *
 * Gets the analysis status of a repository in a CodeQL variant analysis.
 *
 * OAuth app tokens and
 * personal access tokens (classic) need the `security_events` scope to use this endpoint with private
 * or public repositories, or the `public_repo` scope to use this endpoint with only public
 * repositories.
 */
class CodeScanningGetVariantAnalysisRepoTask extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/variant-analyses/{$this->codeqlVariantAnalysisId}/repos/{$this->repoOwner}/{$this->repoName}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the controller repository.
     * @param  int  $codeqlVariantAnalysisId  The ID of the variant analysis.
     * @param  string  $repoOwner  The account owner of the variant analysis repository. The name is not case sensitive.
     * @param  string  $repoName  The name of the variant analysis repository.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $codeqlVariantAnalysisId,
        protected string $repoOwner,
        protected string $repoName,
    ) {}
}
