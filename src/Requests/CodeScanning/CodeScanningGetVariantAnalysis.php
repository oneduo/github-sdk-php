<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/get-variant-analysis
 *
 * Gets the summary of a CodeQL variant analysis.
 *
 * OAuth app tokens and personal access tokens
 * (classic) need the `security_events` scope to use this endpoint with private or public repositories,
 * or the `public_repo` scope to use this endpoint with only public repositories.
 */
class CodeScanningGetVariantAnalysis extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/variant-analyses/{$this->codeqlVariantAnalysisId}";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     * @param  int  $codeqlVariantAnalysisId  The unique identifier of the variant analysis.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $codeqlVariantAnalysisId,
    ) {}
}
