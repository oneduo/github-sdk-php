<?php

declare(strict_types=1);

namespace Oneduo\GitHubSdk\Requests\CodeScanning;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * code-scanning/create-variant-analysis
 *
 * Creates a new CodeQL variant analysis, which will run a CodeQL query against one or more
 * repositories.
 *
 * Get started by learning more about [running CodeQL queries at scale with
 * Multi-Repository Variant
 * Analysis](https://docs.github.com/code-security/codeql-for-vs-code/getting-started-with-codeql-for-vs-code/running-codeql-queries-at-scale-with-multi-repository-variant-analysis).
 *
 * Use
 * the `owner` and `repo` parameters in the URL to specify the controller repository that
 * will be used
 * for running GitHub Actions workflows and storing the results of the CodeQL variant analysis.
 *
 * OAuth
 * app tokens and personal access tokens (classic) need the `repo` scope to use this endpoint.
 */
class CodeScanningCreateVariantAnalysis extends Request implements HasBody {
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string {
        return "/repos/{$this->owner}/{$this->repo}/code-scanning/codeql/variant-analyses";
    }

    /**
     * @param  string  $owner  The account owner of the repository. The name is not case sensitive.
     * @param  string  $repo  The name of the repository without the `.git` extension. The name is not case sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {}
}
